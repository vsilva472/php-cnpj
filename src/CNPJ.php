<?php

namespace Vsilva472\phpCNPJ;

class CNPJ
{
    /**
     * @const int
     */
    const VALID_CNPJ_LENGTH = 14;

    /**
     * @see validate()
     */
    const FIRST_DIGIT_POSITION = 12;

    /**
     * @see validate()
     */
    const SECOND_DIGIT_POSITION = 13;

    /**
     * @var array
     */
    private $dummyValues = array();

    /**
     * CNPJ constructor.
     */
    public function __construct()
    {
        for ($i = 0; $i <= 9; $i++) {
            $this->dummyValues[] = str_pad('', self::VALID_CNPJ_LENGTH, $i);
        }
    }

    public function validate(?string $cnpj)
    {
        if (empty($cnpj)) return false;
        
        $cnpj = strtoupper($this->clean($cnpj));

        if (! $this->hasValidPattern($cnpj)) {
            return false;
        }

        if (strlen($cnpj) !== self::VALID_CNPJ_LENGTH) {
            return false;
        }

        if ($this->isDummyValue($cnpj)) {
            return false;
        }

        $dg1 = $this->calculateDigit($cnpj, self::FIRST_DIGIT_POSITION);

        if ($dg1 != $cnpj[self::FIRST_DIGIT_POSITION]) {
            return false;
        }

        $dg2 = $this->calculateDigit($cnpj, self::SECOND_DIGIT_POSITION);

        if ($dg2 != $cnpj[self::SECOND_DIGIT_POSITION]) {
            return false;
        }

        return true;
    }

    /**
     * Remove apenas máscara e espaços.
     *
     * Mantém letras e números.
     *
     * @param string|int $cnpj
     * @return string
     */
    private function clean($cnpj)
    {
        return preg_replace('/[^A-Za-z0-9]/', '', $cnpj);
    }

    /**
     * Check if a given CNPJ has a valid pattern.
     *
     * Aceita:
     *  - CNPJ numérico tradicional
     *  - CNPJ alfanumérico
     *  - Ambos com ou sem máscara
     *
     * @param string $cnpj
     * @return bool
     */
    private function hasValidPattern($cnpj)
    {
        $masked = '/^[A-Z0-9]{2}\.[A-Z0-9]{3}\.[A-Z0-9]{3}\/[A-Z0-9]{4}-[0-9]{2}$/';
        $unmasked = '/^[A-Z0-9]{14}$/';

        return preg_match($masked, $cnpj) || preg_match($unmasked, $cnpj);
    }

    /**
     * Check if a given CNPJ is a dummy value.
     *
     * @param string $cnpj
     * @return bool
     */
    private function isDummyValue($cnpj)
    {
        return in_array($cnpj, $this->dummyValues);
    }

    /**
     * Calculate digit by position.
     *
     * @param string $cnpj
     * @param int $strLength
     * @return int
     */
    private function calculateDigit($cnpj, $strLength)
    {
        $sum = 0;
        $pos = $strLength - 7;
        $characters = substr($cnpj, 0, $strLength);

        for ($i = $strLength; $i >= 1; $i--) {
            $value = $this->characterValue($characters[$strLength - $i]);

            $sum += $value * $pos--;

            if ($pos < 2) {
                $pos = 9;
            }
        }

        return ($sum % 11) < 2 ? 0 : 11 - ($sum % 11);
    }

    /**
     * Convert a CNPJ character to its numeric value.
     *
     * Digits keep their numeric value.
     * Letters use ASCII - 48:
     *
     * A = 17
     * B = 18
     * ...
     * Z = 42
     *
     * @param string $character
     * @return int
     */
    private function characterValue($character)
    {
        return ord($character) - 48;
    }
}