<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
const DB_NAME = 'test';

/** Имя пользователя базы данных */
const DB_USER = 'funny';

/** Пароль к базе данных */
const DB_PASSWORD = 'qwerty';

/** Имя сервера базы данных */
const DB_HOST = 'localhost';

/** Кодировка базы данных для создания таблиц. */
const DB_CHARSET = 'utf8mb4';

/** Схема сопоставления. Не меняйте, если не уверены. */
const DB_COLLATE = '';

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
const AUTH_KEY = 'g;x+Q;)h${Qq+s<`bhFfOD.Lzs^ef[@Iq0=d5PvaiD1+cpQoBnn*1)Qu!Xr)$TjN';
const SECURE_AUTH_KEY = 'G2#!HU*p&4-WkdhvqEkd=?theC&5XfVMz6:-h-)G_|FDa/;fm3r-Je_M0]6&51v`';
const LOGGED_IN_KEY = 'x|RYn}/huSVAq~7wwA;)8BdZyXJr4*|9Y,az/_YTGXLQP.m^b5%T?$gR0SB1tXdL';
const NONCE_KEY = '}PnVYP_iS5U}6uA6I]Gk]a7RG),;+}$9=3d+-N0D;IW_%;:fl3u+2BAw=e0#(}3K';
const AUTH_SALT = 'K_`x`f!6z.)npp?J6w+C1E}gxqmAky$X! uDb^U%n$4ETwM^9m/qsV7lqq$C7U-y';
const SECURE_AUTH_SALT = '6(n`Cp5PGtwH+xx;rG|8}lG4|qoq%#yswR(.SP#wFz]v4![B CO5Kb39Jz]%os8A';
const LOGGED_IN_SALT = 'pQe[_)TWwphAq14JFr(y(~,0)%Rzwrbw)^H>,Iz>fa4|Ugo~S$uKp)|7 q/K/d+$';
const NONCE_SALT = ',o^?s^[(~.lha/>&4ICi!@L;2xhSr$^)+07Gg6++/~57P qW~6]vQ+&+PHq`ZPzi';

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
const WP_DEBUG = false;

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
