// 创建 wp-config.php 文件
const fs = require('fs')
const fsExtra = require('fs-extra')
const mkdirp = require('mkdirp')
const path = require('path')
const utils = require('./utils.js')
const projectRoot = path.resolve(__dirname, '../../../../')

const name = process.argv[2]
const cssPath = ''
const argv = require('yargs')
	.options('f', {
	  alias: 'file', // 别名
	  demand: true, //必填项
	  describe: 'Please enter the DB name',
	  type: 'string'
	})
	.usage('Usage npm run create [options]')
	.example('npn run create mmldigi')
	.help('h')
	.alias('h', 'help')
	.argv

var dbName = argv._
argv.file ? dbName.unshift(argv.file) : dbName;
if (dbName.length === 0) {
  console.log('Please enter the DB name')
  console.log('Usage npn run create mmldigi')
  return;
}

dbName = utils.unique(dbName)

function createConfig (name) {
	var wpConfigTpl = `<?php
		/**
		 * The base configuration for WordPress
		 *
		 * The wp-config.php creation script uses this file during the
		 * installation. You don't have to use the web site, you can
		 * copy this file to "wp-config.php" and fill in the values.
		 *
		 * This file contains the following configurations:
		 *
		 * * MySQL settings
		 * * Secret keys
		 * * Database table prefix
		 * * ABSPATH
		 *
		 * @link https://codex.wordpress.org/Editing_wp-config.php
		 *
		 * @package WordPress
		 */

		// ** MySQL settings ** //
		/** The name of the database for WordPress */
		define( 'DB_NAME', '${name}' );

		/** MySQL database username */
		define( 'DB_USER', 'root' );

		/** MySQL database password */
		define( 'DB_PASSWORD', 'mmlrocks10000' );

		/** MySQL hostname */
		define( 'DB_HOST', 'mysql.mmler.cn' );

		/** Database Charset to use in creating database tables. */
		define( 'DB_CHARSET', 'utf8' );

		/** The Database Collate type. Don't change this if in doubt. */
		define( 'DB_COLLATE', '' );

		/**
		 * Authentication Unique Keys and Salts.
		 *
		 * Change these to different unique phrases!
		 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
		 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
		 *
		 * @since 2.6.0
		 */
		define('AUTH_KEY',         'LrB2pbXRrcp2KOTJcoU3gK03so8Ed86Ft+IkSxuXAfvvx4A6zYgO7B4SaMhaCgwx+aW+B1or0kpKojsOkJA2kg==');
		define('SECURE_AUTH_KEY',  'Onfsy6mBNUfgz+DuR5drXvsGEa/BXI9Vw1k7gmhc670ijt1D1/WNLqIsOhCGiU8CJ0/u8PpHZ2OrEIS4fJpKWg==');
		define('LOGGED_IN_KEY',    '7fjOcF9aKSfn+PDMrrA5WuYK49MimAJ1PJ+/VMDB+Rnql9B+0mXhTrDp9nup/1ROI0n2N8UUupOJAiEN5Q8N+g==');
		define('NONCE_KEY',        'WFJoVB3ToQ9QBf74GuHFZ9LxP+MZSATudOrZGPvsnT9rLVWINt99I0TJthyZChOl0zdTHdIkJjsqAfcFj9Q2lA==');
		define('AUTH_SALT',        'LhUE2IK81e4toFpjYz0OS+j85l5CuB+/ZHwU6Wm7E1wprnHLL0ckzGA6PZmMHRyhwJF+Tq9XNXBuMOIsyzloqA==');
		define('SECURE_AUTH_SALT', 'D2qZHgVcR12yp+WYsYaOypMhY51z/GWXT0smqH0eF9MD1yqlpXjihYnky25NzVy67lIlqV4+6V9fE8XOcCz9Cg==');
		define('LOGGED_IN_SALT',   'nGxnl0/rV4cF41lFjnw86KPpkA0mq0Kyhojia3smTX+QjolPRKbDrSdJhpBk3/vQ4ZE2JtTJfLuW2ihD3fl8hw==');
		define('NONCE_SALT',       'My6qkAV6MUtAJcfSrHHLzyq+J6C42pewWM+6520VbC5K0YxyoFZCSYlyVt3j0En7L7u8G5DcbhWi0iL4YigMWA==');

		/**
		 * WordPress Database Table prefix.
		 *
		 * You can have multiple installations in one database if you give each
		 * a unique prefix. Only numbers, letters, and underscores please!
		 */
		$table_prefix = 'wp_';


        define( 'WP_DEBUG', true );
        define( 'WP_DEBUG_LOG', false );
        define( 'WP_DEBUG_DISPLAY', false );


		/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
		if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
			$_SERVER['HTTPS'] = 'on';
		}

		/* Inserted by Local by Flywheel. Fixes $is_nginx global for rewrites. */
		if ( ! empty( $_SERVER['SERVER_SOFTWARE'] ) && strpos( $_SERVER['SERVER_SOFTWARE'], 'Flywheel/' ) !== false ) {
			$_SERVER['SERVER_SOFTWARE'] = 'nginx/1.10.1';
		}
		/* That's all, stop editing! Happy blogging. */

		/** Absolute path to the WordPress directory. */
		if ( ! defined( 'ABSPATH' ) )
			define( 'ABSPATH', dirname( __FILE__ ) . '/' );

		/** Sets up WordPress vars and included files. */
		require_once ABSPATH . 'wp-settings.php';
		`
	let filePath = `${projectRoot}/wp-config.php`
	fs.writeFileSync(filePath, wpConfigTpl)

  console.log('create wp-config.php file success')
}

createConfig(dbName)




