<?php

namespace App;

class TechnicalTask
{
    public static function upsideDownWords($str)
    {
        /*
         * Разбиваем строку на слова, сохраняя знаки препинания как отдельные элементы
         * Знаки препинания рассматриваются как отдельные слова благодаря флагам
         */
        $words = preg_split('/(\b|\s)/u', $str, null, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);

        // В контексте этой функции входной параметр (каждый элемент массива $words) обозначен как $word
        $reversed = array_map(function ($word) {

            /*
             * Проверяем, состоит ли слово исключительно из букв
             * Добавляем разрешение на апострофы и тире в словах
             */
            if (preg_match('/^[\p{L}\'"-]+$/u', $word)) {

                // 1. Разворачиваем слово
                $reversedWord = implode('', array_reverse(preg_split('//u', $word, null, PREG_SPLIT_NO_EMPTY)));

                // 2. Анализируем исходное слово в поиске заглавных символов и применяем к развёрнутому слову
                $length = mb_strlen($word);
                for ($i = 0; $i < $length; $i++) {
                    $originalChar = mb_substr($word, $i, 1);
                    $reversedChar = mb_substr($reversedWord, $i, 1);


                    if (mb_strtoupper($originalChar) === $originalChar) {
                        // Если исходный символ был в верхнем регистре, переводим соответствующий символ в развёрнутом слове в верхний регистр
                        $reversedWord = mb_substr($reversedWord, 0, $i) . mb_strtoupper($reversedChar) . mb_substr($reversedWord, $i + 1);
                    } else {
                        // Иначе - в нижний
                        $reversedWord = mb_substr($reversedWord, 0, $i) . mb_strtolower($reversedChar) . mb_substr($reversedWord, $i + 1);
                    }
                }

                return $reversedWord;
            }

            // Если слово не является буквенным, возвращаем как есть
            return $word;
        }, $words);
        /*
         * Объединение в одну строку массив слов
         * Полученная строка содержит инвертированные слова с сохранением их исходного регистра,
         * а также все пробельные символы и знаки препинания на своих местах
         */
        return implode('', $reversed);
    }

}