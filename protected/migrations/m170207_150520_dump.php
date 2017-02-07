
<?php

/**
 * Created with https://github.com/schmunk42/database-command
 */

class m170207_150520_dump extends CDbMigration {

	public function safeUp() {
        if ($this->dbConnection->schema instanceof CMysqlSchema) {
           $options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
        } else {
           $options = '';
        }







        // Data for table 'tbl_migration'
        $this->insert("tbl_migration", array(
            "version"=>"m000000_000000_base",
            "apply_time"=>"1486341857",
        ) );

        $this->insert("tbl_migration", array(
            "version"=>"m170206_022213_dump",
            "apply_time"=>"1486341859",
        ) );




        // Data for table 'vod_archived'



        // Data for table 'vod_banner'



        // Data for table 'vod_billing_provider'
        $this->insert("vod_billing_provider", array(
            "id"=>"25",
            "name"=>"Default",
            "is_active"=>"1",
            "price_adjustment"=>"0.0000",
        ) );

        $this->insert("vod_billing_provider", array(
            "id"=>"26",
            "name"=>"Acme",
            "is_active"=>"1",
            "price_adjustment"=>"0.0000",
        ) );

        $this->insert("vod_billing_provider", array(
            "id"=>"27",
            "name"=>"Smartpay.tv",
            "is_active"=>"1",
            "price_adjustment"=>"0.0000",
        ) );

        $this->insert("vod_billing_provider", array(
            "id"=>"28",
            "name"=>"EMT",
            "is_active"=>"1",
            "price_adjustment"=>"0.0000",
        ) );




        // Data for table 'vod_campaign'



        // Data for table 'vod_campaign_distributor'



        // Data for table 'vod_campaign_package'



        // Data for table 'vod_campaign_ticket'



        // Data for table 'vod_campaign_title'



        // Data for table 'vod_comment'



        // Data for table 'vod_content_provider'
        $this->insert("vod_content_provider", array(
            "id"=>"1",
            "name"=>"Acme",
            "active"=>"1",
            "email"=>"acme@acme.com",
            "default_library"=>"2",
            "default_current"=>"3",
            "svod_enabled"=>"0",
            "default_profit_sharing"=>"50",
            "created_at"=>"2011-12-12 15:52:15",
            "updated_at"=>"2016-04-19 04:07:50",
            "billing_provider_id"=>"26",
            "api_key"=>"12345",
        ) );




        // Data for table 'vod_content_provider_distributor'



        // Data for table 'vod_content_provider_studio'



        // Data for table 'vod_content_provider_user'



        // Data for table 'vod_country'
        $this->insert("vod_country", array(
            "id"=>"1",
            "image_id"=>null,
            "name"=>"Korea",
            "code"=>"KR",
            "updated_at"=>"2012-01-01 00:00:00",
            "created_at"=>"0000-00-00 00:00:00",
        ) );

        $this->insert("vod_country", array(
            "id"=>"2",
            "image_id"=>null,
            "name"=>"Suurbritannia",
            "code"=>"GB",
            "updated_at"=>"2012-03-20 13:59:08",
            "created_at"=>"0000-00-00 00:00:00",
        ) );

        $this->insert("vod_country", array(
            "id"=>"3",
            "image_id"=>null,
            "name"=>"Šveits",
            "code"=>"CH",
            "updated_at"=>"2012-03-20 13:59:23",
            "created_at"=>"0000-00-00 00:00:00",
        ) );

        $this->insert("vod_country", array(
            "id"=>"4",
            "image_id"=>null,
            "name"=>"Saksa",
            "code"=>"DE",
            "updated_at"=>"2012-03-20 13:59:35",
            "created_at"=>"0000-00-00 00:00:00",
        ) );

        $this->insert("vod_country", array(
            "id"=>"5",
            "image_id"=>null,
            "name"=>"Itaalia",
            "code"=>"IT",
            "updated_at"=>"2012-03-20 13:59:44",
            "created_at"=>"0000-00-00 00:00:00",
        ) );

        $this->insert("vod_country", array(
            "id"=>"6",
            "image_id"=>null,
            "name"=>"Holland",
            "code"=>"NL",
            "updated_at"=>"2012-03-20 13:59:58",
            "created_at"=>"0000-00-00 00:00:00",
        ) );

        $this->insert("vod_country", array(
            "id"=>"7",
            "image_id"=>null,
            "name"=>"Hong Kong",
            "code"=>"HK",
            "updated_at"=>"2012-01-01 00:00:00",
            "created_at"=>"0000-00-00 00:00:00",
        ) );

        $this->insert("vod_country", array(
            "id"=>"8",
            "image_id"=>null,
            "name"=>"Jaapan",
            "code"=>"JP",
            "updated_at"=>"2012-03-20 14:00:24",
            "created_at"=>"0000-00-00 00:00:00",
        ) );

        $this->insert("vod_country", array(
            "id"=>"9",
            "image_id"=>null,
            "name"=>"Ameerika Ühendriigid",
            "code"=>"US",
            "updated_at"=>"2012-03-20 14:00:34",
            "created_at"=>"0000-00-00 00:00:00",
        ) );

        $this->insert("vod_country", array(
            "id"=>"10",
            "image_id"=>null,
            "name"=>"Prantsusmaa",
            "code"=>"FR",
            "updated_at"=>"2012-03-20 14:00:44",
            "created_at"=>"0000-00-00 00:00:00",
        ) );

        $this->insert("vod_country", array(
            "id"=>"11",
            "image_id"=>null,
            "name"=>"Mongoolia",
            "code"=>"MN",
            "updated_at"=>"2012-01-01 00:00:00",
            "created_at"=>"0000-00-00 00:00:00",
        ) );

        $this->insert("vod_country", array(
            "id"=>"12",
            "image_id"=>null,
            "name"=>"Venemaa",
            "code"=>"RU",
            "updated_at"=>"2012-03-20 14:04:04",
            "created_at"=>"0000-00-00 00:00:00",
        ) );

        $this->insert("vod_country", array(
            "id"=>"13",
            "image_id"=>null,
            "name"=>"Hispaania",
            "code"=>"ES",
            "updated_at"=>"2012-03-20 14:04:04",
            "created_at"=>"0000-00-00 00:00:00",
        ) );

        $this->insert("vod_country", array(
            "id"=>"14",
            "image_id"=>null,
            "name"=>"Belgia",
            "code"=>"BE",
            "updated_at"=>"2012-03-20 14:04:04",
            "created_at"=>"0000-00-00 00:00:00",
        ) );

        $this->insert("vod_country", array(
            "id"=>"15",
            "image_id"=>null,
            "name"=>"Rootsi",
            "code"=>"SE",
            "updated_at"=>"2012-03-20 14:04:04",
            "created_at"=>"2012-02-14 00:23:59",
        ) );

        $this->insert("vod_country", array(
            "id"=>"16",
            "image_id"=>null,
            "name"=>"Austraalia",
            "code"=>"AU",
            "updated_at"=>"2012-02-14 00:26:58",
            "created_at"=>"2012-02-14 00:26:58",
        ) );

        $this->insert("vod_country", array(
            "id"=>"17",
            "image_id"=>null,
            "name"=>"Mehhiko",
            "code"=>"MX",
            "updated_at"=>"2012-03-20 14:04:04",
            "created_at"=>"2012-02-14 00:28:13",
        ) );

        $this->insert("vod_country", array(
            "id"=>"18",
            "image_id"=>null,
            "name"=>"India",
            "code"=>"IN",
            "updated_at"=>"2012-03-20 14:04:04",
            "created_at"=>"2012-02-14 00:32:54",
        ) );

        $this->insert("vod_country", array(
            "id"=>"19",
            "image_id"=>null,
            "name"=>"Kanada",
            "code"=>"CA",
            "updated_at"=>"2012-03-20 14:04:04",
            "created_at"=>"2012-02-14 01:32:25",
        ) );

        $this->insert("vod_country", array(
            "id"=>"20",
            "image_id"=>null,
            "name"=>"Liibanon",
            "code"=>"LB",
            "updated_at"=>"2012-03-20 14:04:04",
            "created_at"=>"2012-02-14 01:35:59",
        ) );

        $this->insert("vod_country", array(
            "id"=>"21",
            "image_id"=>null,
            "name"=>"Ungari",
            "code"=>"HU",
            "updated_at"=>"2012-03-20 14:04:04",
            "created_at"=>"2012-02-14 01:39:32",
        ) );

        $this->insert("vod_country", array(
            "id"=>"22",
            "image_id"=>null,
            "name"=>"Austria",
            "code"=>"AT",
            "updated_at"=>"2012-02-14 02:03:22",
            "created_at"=>"2012-02-14 02:03:22",
        ) );

        $this->insert("vod_country", array(
            "id"=>"23",
            "image_id"=>null,
            "name"=>"Hiina",
            "code"=>"CN",
            "updated_at"=>"2012-03-20 14:04:04",
            "created_at"=>"2012-02-14 04:18:06",
        ) );

        $this->insert("vod_country", array(
            "id"=>"24",
            "image_id"=>null,
            "name"=>"Iisrael",
            "code"=>"IL",
            "updated_at"=>"2012-02-17 00:44:25",
            "created_at"=>"2012-02-17 00:44:25",
        ) );

        $this->insert("vod_country", array(
            "id"=>"25",
            "image_id"=>null,
            "name"=>"Tai",
            "code"=>"TH",
            "updated_at"=>"2012-03-20 14:04:04",
            "created_at"=>"2012-02-17 01:08:16",
        ) );

        $this->insert("vod_country", array(
            "id"=>"26",
            "image_id"=>null,
            "name"=>"Uus-Meremaa",
            "code"=>"NZ",
            "updated_at"=>"2012-03-20 14:04:04",
            "created_at"=>"2012-02-17 01:46:03",
        ) );

        $this->insert("vod_country", array(
            "id"=>"27",
            "image_id"=>null,
            "name"=>"Soome",
            "code"=>"FI",
            "updated_at"=>"2012-03-20 14:04:04",
            "created_at"=>"2012-02-17 02:14:15",
        ) );

        $this->insert("vod_country", array(
            "id"=>"28",
            "image_id"=>null,
            "name"=>"Eesti",
            "code"=>"EE",
            "updated_at"=>"2012-03-20 14:04:04",
            "created_at"=>"2012-02-17 02:14:15",
        ) );

        $this->insert("vod_country", array(
            "id"=>"29",
            "image_id"=>null,
            "name"=>"Rumeenia",
            "code"=>"RO",
            "updated_at"=>"2012-02-17 02:36:25",
            "created_at"=>"2012-02-17 02:36:25",
        ) );

        $this->insert("vod_country", array(
            "id"=>"30",
            "image_id"=>null,
            "name"=>"Indoneesia",
            "code"=>"ID",
            "updated_at"=>"2012-02-17 02:43:05",
            "created_at"=>"2012-02-17 02:43:05",
        ) );

        $this->insert("vod_country", array(
            "id"=>"31",
            "image_id"=>null,
            "name"=>"Lõuna-Aafrika Vabariik",
            "code"=>"ZA",
            "updated_at"=>"2012-03-20 14:05:26",
            "created_at"=>"2012-02-17 02:53:40",
        ) );

        $this->insert("vod_country", array(
            "id"=>"32",
            "image_id"=>null,
            "name"=>"Taani",
            "code"=>"DK",
            "updated_at"=>"2012-03-20 14:05:26",
            "created_at"=>"2012-02-17 02:58:30",
        ) );

        $this->insert("vod_country", array(
            "id"=>"33",
            "image_id"=>null,
            "name"=>"Island",
            "code"=>"IS",
            "updated_at"=>"2012-03-20 14:05:26",
            "created_at"=>"2012-02-17 02:58:30",
        ) );

        $this->insert("vod_country", array(
            "id"=>"34",
            "image_id"=>null,
            "name"=>"Singapur",
            "code"=>"SG",
            "updated_at"=>"2012-02-17 03:27:27",
            "created_at"=>"2012-02-17 03:27:27",
        ) );

        $this->insert("vod_country", array(
            "id"=>"35",
            "image_id"=>null,
            "name"=>"Norra",
            "code"=>"NO",
            "updated_at"=>"2012-03-20 14:05:26",
            "created_at"=>"2012-02-17 03:44:52",
        ) );

        $this->insert("vod_country", array(
            "id"=>"36",
            "image_id"=>null,
            "name"=>"Ukraina",
            "code"=>"UA",
            "updated_at"=>"2012-03-20 14:05:26",
            "created_at"=>"2012-02-17 12:35:41",
        ) );

        $this->insert("vod_country", array(
            "id"=>"37",
            "image_id"=>null,
            "name"=>"Serbia ja Montenegro",
            "code"=>"CS",
            "updated_at"=>"2012-03-20 14:05:26",
            "created_at"=>"2012-02-17 13:07:16",
        ) );

        $this->insert("vod_country", array(
            "id"=>"38",
            "image_id"=>null,
            "name"=>"Poola",
            "code"=>"PL",
            "updated_at"=>"2012-03-20 14:05:26",
            "created_at"=>"2012-02-17 13:07:16",
        ) );

        $this->insert("vod_country", array(
            "id"=>"39",
            "image_id"=>null,
            "name"=>"Iirimaa",
            "code"=>"IE",
            "updated_at"=>"2012-03-20 14:05:26",
            "created_at"=>"2012-02-17 13:08:29",
        ) );

        $this->insert("vod_country", array(
            "id"=>"40",
            "image_id"=>null,
            "name"=>"Kolumbia",
            "code"=>"CO",
            "updated_at"=>"2012-03-20 14:05:26",
            "created_at"=>"2012-02-17 13:25:17",
        ) );

        $this->insert("vod_country", array(
            "id"=>"41",
            "image_id"=>null,
            "name"=>"Luksemburg",
            "code"=>"LU",
            "updated_at"=>"2012-03-20 14:05:26",
            "created_at"=>"2012-02-17 13:30:07",
        ) );

        $this->insert("vod_country", array(
            "id"=>"42",
            "image_id"=>null,
            "name"=>"Tšehhi",
            "code"=>"CZ",
            "updated_at"=>"2012-03-20 14:05:26",
            "created_at"=>"2012-02-18 16:07:18",
        ) );

        $this->insert("vod_country", array(
            "id"=>"43",
            "image_id"=>null,
            "name"=>"Korea",
            "code"=>"KP",
            "updated_at"=>"2012-02-25 14:44:42",
            "created_at"=>"2012-02-25 14:44:42",
        ) );

        $this->insert("vod_country", array(
            "id"=>"44",
            "image_id"=>null,
            "name"=>"Filipiinid",
            "code"=>"PH",
            "updated_at"=>"2012-03-20 14:05:26",
            "created_at"=>"2012-03-17 10:58:26",
        ) );

        $this->insert("vod_country", array(
            "id"=>"45",
            "image_id"=>null,
            "name"=>"Gruusia",
            "code"=>"GE",
            "updated_at"=>"2012-03-27 20:53:05",
            "created_at"=>"2012-03-27 20:53:05",
        ) );

        $this->insert("vod_country", array(
            "id"=>"46",
            "image_id"=>null,
            "name"=>"Maroko",
            "code"=>"MA",
            "updated_at"=>"2012-03-31 10:42:47",
            "created_at"=>"2012-03-31 10:42:47",
        ) );

        $this->insert("vod_country", array(
            "id"=>"47",
            "image_id"=>null,
            "name"=>"Malta",
            "code"=>"MT",
            "updated_at"=>"2012-03-31 10:42:47",
            "created_at"=>"2012-03-31 10:42:47",
        ) );

        $this->insert("vod_country", array(
            "id"=>"48",
            "image_id"=>null,
            "name"=>"Brasiilia",
            "code"=>"BR",
            "updated_at"=>"2012-04-04 17:17:20",
            "created_at"=>"2012-04-04 17:17:20",
        ) );

        $this->insert("vod_country", array(
            "id"=>"49",
            "image_id"=>null,
            "name"=>"Türgi",
            "code"=>"TR",
            "updated_at"=>"2012-04-04 17:28:04",
            "created_at"=>"2012-04-04 17:28:04",
        ) );

        $this->insert("vod_country", array(
            "id"=>"54",
            "image_id"=>null,
            "name"=>"Estonia",
            "code"=>"EE",
            "updated_at"=>"2012-10-03 16:23:19",
            "created_at"=>"2012-10-03 16:23:19",
        ) );

        $this->insert("vod_country", array(
            "id"=>"53",
            "image_id"=>null,
            "name"=>"United Kingdom",
            "code"=>"GB",
            "updated_at"=>"2012-08-16 10:27:18",
            "created_at"=>"2012-08-16 10:27:18",
        ) );

        $this->insert("vod_country", array(
            "id"=>"55",
            "image_id"=>null,
            "name"=>"Russian Federation",
            "code"=>"RU",
            "updated_at"=>"2012-10-03 18:35:16",
            "created_at"=>"2012-10-03 18:35:16",
        ) );

        $this->insert("vod_country", array(
            "id"=>"56",
            "image_id"=>null,
            "name"=>"Kreeka",
            "code"=>"GR",
            "updated_at"=>"2012-11-13 14:55:56",
            "created_at"=>"0000-00-00 00:00:00",
        ) );

        $this->insert("vod_country", array(
            "id"=>"57",
            "image_id"=>null,
            "name"=>"Germany",
            "code"=>"DE",
            "updated_at"=>"2012-11-23 12:48:49",
            "created_at"=>"2012-11-23 12:48:49",
        ) );

        $this->insert("vod_country", array(
            "id"=>"58",
            "image_id"=>null,
            "name"=>"Spain",
            "code"=>"ES",
            "updated_at"=>"2012-11-23 12:48:49",
            "created_at"=>"2012-11-23 12:48:49",
        ) );

        $this->insert("vod_country", array(
            "id"=>"59",
            "image_id"=>null,
            "name"=>"Sweden",
            "code"=>"SE",
            "updated_at"=>"2012-11-23 12:53:54",
            "created_at"=>"2012-11-23 12:53:54",
        ) );

        $this->insert("vod_country", array(
            "id"=>"60",
            "image_id"=>null,
            "name"=>"Denmark",
            "code"=>"DK",
            "updated_at"=>"2012-11-27 11:23:46",
            "created_at"=>"2012-11-27 11:23:46",
        ) );

        $this->insert("vod_country", array(
            "id"=>"61",
            "image_id"=>null,
            "name"=>"United States of America",
            "code"=>"US",
            "updated_at"=>"2013-01-04 15:44:09",
            "created_at"=>"2013-01-04 15:44:09",
        ) );

        $this->insert("vod_country", array(
            "id"=>"62",
            "image_id"=>null,
            "name"=>"Finland",
            "code"=>"FI",
            "updated_at"=>"2013-02-27 15:35:52",
            "created_at"=>"2013-02-27 15:35:52",
        ) );

        $this->insert("vod_country", array(
            "id"=>"63",
            "image_id"=>null,
            "name"=>"France",
            "code"=>"FR",
            "updated_at"=>"2013-05-07 15:15:47",
            "created_at"=>"2013-05-07 15:15:47",
        ) );

        $this->insert("vod_country", array(
            "id"=>"64",
            "image_id"=>null,
            "name"=>"United Arab Emirates",
            "code"=>"ae",
            "updated_at"=>"2016-06-21 12:48:19",
            "created_at"=>"2016-06-21 12:48:19",
        ) );

        $this->insert("vod_country", array(
            "id"=>"65",
            "image_id"=>null,
            "name"=>"Puerto Rico",
            "code"=>"pr",
            "updated_at"=>"2016-09-23 21:46:30",
            "created_at"=>"2016-09-23 21:46:30",
        ) );




        // Data for table 'vod_country_group'



        // Data for table 'vod_credits'



        // Data for table 'vod_cron'



        // Data for table 'vod_distributor'
        $this->insert("vod_distributor", array(
            "id"=>"11",
            "name"=>"Vifi Desktop",
            "apikey"=>"12345",
            "ip_address"=>"*",
            "last_access"=>"2017-01-29 13:30:25",
            "active"=>"1",
            "last_sync"=>null,
            "url"=>"http://www.vifi.ee",
            "sync_url"=>null,
            "resolve_url"=>"http://www.vifi.ee/est/filmid.m/{{base_name}}",
            "error_url"=>null,
            "profit_sharing"=>"0.00",
            "profit_sharing_type"=>"0",
            "price_adjust"=>null,
            "statistics_ip_access"=>"",
            "language"=>"en",
            "updated_at"=>"2016-07-28 18:24:18",
            "created_at"=>null,
        ) );




        // Data for table 'vod_distributor_banner'



        // Data for table 'vod_distributor_featured'



        // Data for table 'vod_distributor_group'



        // Data for table 'vod_distributor_log'



        // Data for table 'vod_distributor_payment_method'



        // Data for table 'vod_distributor_studio'



        // Data for table 'vod_distributor_user'



        // Data for table 'vod_favourite'



        // Data for table 'vod_featured'



        // Data for table 'vod_genre'
        $this->insert("vod_genre", array(
            "id"=>"12",
            "name"=>"Adventure",
            "type"=>"1",
            "updated_at"=>"2015-07-20 01:18:34",
            "created_at"=>"2013-10-10 14:30:08",
            "validfrom"=>"2011-12-01 01:00:00",
            "allowpurchase"=>"1",
            "limit"=>"0",
            "selector"=>null,
            "order_by"=>"0",
            "order_direction"=>"asc",
            "deleted"=>"0",
        ) );

        $this->insert("vod_genre", array(
            "id"=>"14",
            "name"=>"Fantasy",
            "type"=>"1",
            "updated_at"=>"2015-06-28 12:18:35",
            "created_at"=>null,
            "validfrom"=>"2011-12-31 01:00:00",
            "allowpurchase"=>"1",
            "limit"=>"0",
            "selector"=>null,
            "order_by"=>"0",
            "order_direction"=>"asc",
            "deleted"=>"0",
        ) );

        $this->insert("vod_genre", array(
            "id"=>"16",
            "name"=>"Cartoon",
            "type"=>"1",
            "updated_at"=>"2015-07-20 01:38:12",
            "created_at"=>"2013-09-23 11:47:12",
            "validfrom"=>"2011-12-31 01:00:00",
            "allowpurchase"=>"1",
            "limit"=>"0",
            "selector"=>null,
            "order_by"=>"0",
            "order_direction"=>"asc",
            "deleted"=>"0",
        ) );

        $this->insert("vod_genre", array(
            "id"=>"18",
            "name"=>"Drama",
            "type"=>"1",
            "updated_at"=>"2015-06-28 12:03:56",
            "created_at"=>null,
            "validfrom"=>"2012-01-30 01:00:00",
            "allowpurchase"=>"1",
            "limit"=>"333",
            "selector"=>null,
            "order_by"=>"original_name",
            "order_direction"=>"asc",
            "deleted"=>"0",
        ) );

        $this->insert("vod_genre", array(
            "id"=>"36",
            "name"=>"History",
            "type"=>"1",
            "updated_at"=>"2015-06-27 15:10:08",
            "created_at"=>"2013-12-10 15:59:22",
            "validfrom"=>"2011-12-31 01:00:00",
            "allowpurchase"=>"0",
            "limit"=>"0",
            "selector"=>null,
            "order_by"=>"0",
            "order_direction"=>"asc",
            "deleted"=>"0",
        ) );

        $this->insert("vod_genre", array(
            "id"=>"37",
            "name"=>"Western",
            "type"=>"1",
            "updated_at"=>"2015-06-27 14:58:46",
            "created_at"=>"2015-01-24 17:21:19",
            "validfrom"=>"2011-12-31 01:00:00",
            "allowpurchase"=>"0",
            "limit"=>"0",
            "selector"=>null,
            "order_by"=>"0",
            "order_direction"=>"asc",
            "deleted"=>"0",
        ) );

        $this->insert("vod_genre", array(
            "id"=>"53",
            "name"=>"Thriller",
            "type"=>"1",
            "updated_at"=>null,
            "created_at"=>"2013-09-23 01:47:47",
            "validfrom"=>"2012-01-01 00:00:00",
            "allowpurchase"=>"0",
            "limit"=>"0",
            "selector"=>null,
            "order_by"=>null,
            "order_direction"=>"asc",
            "deleted"=>"0",
        ) );

        $this->insert("vod_genre", array(
            "id"=>"80",
            "name"=>"Crime",
            "type"=>"1",
            "updated_at"=>null,
            "created_at"=>"2013-12-21 19:19:08",
            "validfrom"=>"2012-01-01 00:00:00",
            "allowpurchase"=>"0",
            "limit"=>"0",
            "selector"=>null,
            "order_by"=>null,
            "order_direction"=>"asc",
            "deleted"=>"0",
        ) );

        $this->insert("vod_genre", array(
            "id"=>"99",
            "name"=>"Documentary",
            "type"=>"1",
            "updated_at"=>"2015-06-27 14:50:52",
            "created_at"=>"2014-04-15 14:38:54",
            "validfrom"=>"2011-12-31 01:00:00",
            "allowpurchase"=>"0",
            "limit"=>"0",
            "selector"=>null,
            "order_by"=>"0",
            "order_direction"=>"asc",
            "deleted"=>"0",
        ) );

        $this->insert("vod_genre", array(
            "id"=>"878",
            "name"=>"Science Fiction",
            "type"=>"1",
            "updated_at"=>null,
            "created_at"=>"2013-09-23 01:47:47",
            "validfrom"=>"2012-01-01 00:00:00",
            "allowpurchase"=>"0",
            "limit"=>"0",
            "selector"=>null,
            "order_by"=>null,
            "order_direction"=>"asc",
            "deleted"=>"0",
        ) );




        // Data for table 'vod_genre_distributor'



        // Data for table 'vod_genre_favourite'



        // Data for table 'vod_genre_filter'



        // Data for table 'vod_genre_group'



        // Data for table 'vod_image_group'



        // Data for table 'vod_language'



        // Data for table 'vod_language_group'



        // Data for table 'vod_lng'



        // Data for table 'vod_media'



        // Data for table 'vod_media_group'



        // Data for table 'vod_media_image'



        // Data for table 'vod_media_subtitle'



        // Data for table 'vod_media_video'



        // Data for table 'vod_package'
        $this->insert("vod_package", array(
            "id"=>"23",
            "name"=>"Naistepäeva kuuspakk",
            "title"=>"",
            "description"=>"Tee naistepäeva nädalavahetus mõnusaks ja vaata häid filme, kus tegutsevad ägedad naised.",
            "created_at"=>"2013-03-07 10:00:56",
            "updated_at"=>"2015-07-13 14:44:08",
            "released"=>null,
            "is_deleted"=>"0",
            "price"=>"0",
            "type"=>"0",
            "price_class_id"=>"4",
            "active"=>"1",
            "featured"=>"0",
            "approved"=>"0",
            "comment"=>"",
            "img_id"=>"97379",
            "broken"=>null,
            "geo_restricted"=>null,
        ) );

        $this->insert("vod_package", array(
            "id"=>"24",
            "name"=>"Koolivaheaja kümnekas",
            "title"=>"",
            "description"=>"Ahoi kevadised kärbsed! Koolivaheajal on mõnus aega surnuks lüüa teleka ees või arvuti ekraanil filme vaadates, sest nüüd saab tellida kümnese komplekti ägedat kraami vaid 9.90 eest. Lennake aga filmidele peale, kes rehkendada oskavad.",
            "created_at"=>"2013-03-13 16:05:49",
            "updated_at"=>"2013-03-13 17:07:11",
            "released"=>null,
            "is_deleted"=>"0",
            "price"=>"0",
            "type"=>"0",
            "price_class_id"=>"4",
            "active"=>"1",
            "featured"=>"0",
            "approved"=>"0",
            "comment"=>"",
            "img_id"=>"89892",
            "broken"=>null,
            "geo_restricted"=>null,
        ) );

        $this->insert("vod_package", array(
            "id"=>"22",
            "name"=>"Oscarivõitjate kuuspakk",
            "title"=>"",
            "description"=>"Oscari kuuspakk sisaldab filmivalikut, mis ei jäta külmaks isegi kõige nõudlikumat filmigurmaani. Kuldse mehikesega auhinnatud kuuspakk on nagu filmimaailma kohustuslik kirjandus.",
            "created_at"=>"2013-03-01 15:25:08",
            "updated_at"=>"2013-03-01 16:34:38",
            "released"=>null,
            "is_deleted"=>"0",
            "price"=>"0",
            "type"=>"0",
            "price_class_id"=>"4",
            "active"=>"1",
            "featured"=>"0",
            "approved"=>"0",
            "comment"=>"",
            "img_id"=>"89510",
            "broken"=>null,
            "geo_restricted"=>null,
        ) );




        // Data for table 'vod_package_group'



        // Data for table 'vod_payment_emt'



        // Data for table 'vod_pending_activation'



        // Data for table 'vod_person'



        // Data for table 'vod_person_favourite'



        // Data for table 'vod_purchase'



        // Data for table 'vod_rating'



        // Data for table 'vod_season'



        // Data for table 'vod_season_episode'



        // Data for table 'vod_seen'



        // Data for table 'vod_status'



        // Data for table 'vod_studio'



        // Data for table 'vod_studio_group'



        // Data for table 'vod_subscription'
        $this->insert("vod_subscription", array(
            "id"=>"1",
            "title"=>"1 kuu",
            "description"=>"30 päeva tellimus",
            "price_class_id"=>"40",
            "notion"=>"Säästa 55%",
            "created_at"=>"2014-12-01 17:44:41",
            "updated_at"=>"2014-12-02 00:05:53",
        ) );

        $this->insert("vod_subscription", array(
            "id"=>"8",
            "title"=>"1 nädal",
            "description"=>"7 päeva tellimus",
            "price_class_id"=>"39",
            "notion"=>null,
            "created_at"=>"2014-12-01 22:46:46",
            "updated_at"=>"2014-12-02 02:31:55",
        ) );

        $this->insert("vod_subscription", array(
            "id"=>"9",
            "title"=>"1 aasta",
            "description"=>"365 päeva tellimus",
            "price_class_id"=>"41",
            "notion"=>"Säästa 15%",
            "created_at"=>"2014-12-01 22:47:07",
            "updated_at"=>"2014-12-02 02:32:09",
        ) );




        // Data for table 'vod_subtitle'



        // Data for table 'vod_subtitle_group'



        // Data for table 'vod_subtitles'



        // Data for table 'vod_tag'



        // Data for table 'vod_tags'



        // Data for table 'vod_ticket'



        // Data for table 'vod_ticket_bill'



        // Data for table 'vod_ticket_payment_method'
        $this->insert("vod_ticket_payment_method", array(
            "id"=>"1",
            "provider_id"=>"25",
            "active"=>"1",
            "name"=>"SEB",
            "identifier"=>"Seb",
            "testing"=>"0",
            "transaction_fee"=>"0",
            "transaction_type"=>"0",
        ) );

        $this->insert("vod_ticket_payment_method", array(
            "id"=>"2",
            "provider_id"=>"25",
            "active"=>"1",
            "name"=>"Swedbank",
            "identifier"=>"Swedbank",
            "testing"=>"0",
            "transaction_fee"=>"0",
            "transaction_type"=>"1",
        ) );

        $this->insert("vod_ticket_payment_method", array(
            "id"=>"3",
            "provider_id"=>"25",
            "active"=>"1",
            "name"=>"Danske Bank",
            "identifier"=>"Sampo",
            "testing"=>"0",
            "transaction_fee"=>"0",
            "transaction_type"=>"0",
        ) );

        $this->insert("vod_ticket_payment_method", array(
            "id"=>"4",
            "provider_id"=>"25",
            "active"=>"1",
            "name"=>"NORDEA",
            "identifier"=>"Nordea",
            "testing"=>"0",
            "transaction_fee"=>"0",
            "transaction_type"=>"0",
        ) );

        $this->insert("vod_ticket_payment_method", array(
            "id"=>"5",
            "provider_id"=>"25",
            "active"=>"1",
            "name"=>"CreditCard",
            "identifier"=>"Estcard",
            "testing"=>"0",
            "transaction_fee"=>"0",
            "transaction_type"=>"0",
        ) );

        $this->insert("vod_ticket_payment_method", array(
            "id"=>"19",
            "provider_id"=>"25",
            "active"=>"1",
            "name"=>"Kood",
            "identifier"=>"code",
            "testing"=>"0",
            "transaction_fee"=>"0",
            "transaction_type"=>"0",
        ) );

        $this->insert("vod_ticket_payment_method", array(
            "id"=>"20",
            "provider_id"=>"27",
            "active"=>"1",
            "name"=>"Smartpay",
            "identifier"=>null,
            "testing"=>"0",
            "transaction_fee"=>"0",
            "transaction_type"=>"0",
        ) );

        $this->insert("vod_ticket_payment_method", array(
            "id"=>"21",
            "provider_id"=>"25",
            "active"=>"1",
            "name"=>"Testing",
            "identifier"=>"testing",
            "testing"=>"1",
            "transaction_fee"=>"0",
            "transaction_type"=>"0",
        ) );

        $this->insert("vod_ticket_payment_method", array(
            "id"=>"22",
            "provider_id"=>"28",
            "active"=>"1",
            "name"=>"Mobiil",
            "identifier"=>"mobile",
            "testing"=>"0",
            "transaction_fee"=>"0",
            "transaction_type"=>"0",
        ) );




        // Data for table 'vod_ticket_price_class'
        $this->insert("vod_ticket_price_class", array(
            "id"=>"1",
            "name"=>"Default VOD price",
            "price"=>"2.20",
            "amount"=>"1",
            "duration"=>"48",
            "unit"=>"1",
            "type"=>"1",
            "lock_on_activation"=>"1",
            "instant_activation"=>"1",
            "created_at"=>"2012-09-01 15:57:54",
            "updated_at"=>"2013-10-06 02:58:47",
        ) );

        $this->insert("vod_ticket_price_class", array(
            "id"=>"7",
            "name"=>"Free movie",
            "price"=>"0.00",
            "amount"=>"1",
            "duration"=>"24",
            "unit"=>"1",
            "type"=>"5",
            "lock_on_activation"=>"1",
            "instant_activation"=>"1",
            "created_at"=>"2012-09-25 12:40:29",
            "updated_at"=>"2012-09-25 12:40:29",
        ) );

        $this->insert("vod_ticket_price_class", array(
            "id"=>"37",
            "name"=>"App purchase",
            "price"=>"2.20",
            "amount"=>"1",
            "duration"=>"48",
            "unit"=>"1",
            "type"=>"2",
            "lock_on_activation"=>"1",
            "instant_activation"=>"1",
            "created_at"=>"2014-04-20 18:01:02",
            "updated_at"=>"2014-07-29 00:17:40",
        ) );

        $this->insert("vod_ticket_price_class", array(
            "id"=>"38",
            "name"=>"Weekly subscription",
            "price"=>"3.00",
            "amount"=>"1",
            "duration"=>"168",
            "unit"=>"1",
            "type"=>"4",
            "lock_on_activation"=>"1",
            "instant_activation"=>"1",
            "created_at"=>"2014-10-13 18:51:01",
            "updated_at"=>"2014-10-13 18:51:01",
        ) );

        $this->insert("vod_ticket_price_class", array(
            "id"=>"39",
            "name"=>"1 week Subscription ",
            "price"=>"3.90",
            "amount"=>"1",
            "duration"=>"7",
            "unit"=>"2",
            "type"=>"4",
            "lock_on_activation"=>"1",
            "instant_activation"=>"1",
            "created_at"=>"2014-12-01 18:32:23",
            "updated_at"=>"2014-12-11 19:37:49",
        ) );

        $this->insert("vod_ticket_price_class", array(
            "id"=>"40",
            "name"=>"1 month Subscription ",
            "price"=>"6.90",
            "amount"=>"1",
            "duration"=>"30",
            "unit"=>"2",
            "type"=>"4",
            "lock_on_activation"=>"1",
            "instant_activation"=>"1",
            "created_at"=>"2014-12-01 18:32:53",
            "updated_at"=>"2014-12-11 19:39:09",
        ) );

        $this->insert("vod_ticket_price_class", array(
            "id"=>"41",
            "name"=>"1 year Subscription ",
            "price"=>"69.90",
            "amount"=>"1",
            "duration"=>"12",
            "unit"=>"4",
            "type"=>"4",
            "lock_on_activation"=>"1",
            "instant_activation"=>"1",
            "created_at"=>"2014-12-01 18:33:54",
            "updated_at"=>"2014-12-05 18:11:27",
        ) );




        // Data for table 'vod_ticket_price_group'



        // Data for table 'vod_ticket_session'



        // Data for table 'vod_title'
        $this->insert("vod_title", array(
            "id"=>"58933",
            "md5"=>null,
            "title"=>"Kick-Ass",
            "original_name"=>"Kick-Ass",
            "alternative_name"=>"Kick-Ass: Uus superkangelane",
            "base_name"=>"kick-ass",
            "parent_id"=>null,
            "author_id"=>"1",
            "provider_id"=>"1",
            "featured"=>"0",
            "approved"=>"0",
            "geo_restricted"=>"1",
            "broken"=>null,
            "ean"=>null,
            "vet"=>null,
            "price"=>"3.00",
            "popularity"=>null,
            "active"=>"0",
            "year"=>"2010",
            "agelimit"=>null,
            "comment"=>null,
            "imdb_id"=>"tt1250777",
            "tmdb_id"=>"23483",
            "rt_id"=>"",
            "efi_id"=>null,
            "price_class_id"=>"1",
            "runtime"=>"117",
            "overview"=>"Dave Liziewski (Aaron Johnson) on tavaline keskkooliõpilane, kelle suurimaks hobiks on koomiksid - ta elab tavalist elu oma tavaliste sõprade ja tavaliste nõrkustega. Mis on suures osas ka põhjus, miks ta otsustab ühel päeval hakata superkangelaseks. Pole tähtis, et ta pole vormis, tal pole sobilikku treeningut ega, jumala eest, mingeid supervõimeid - vahel lihtsalt tuleb see tunne ja kes on tavaline nohik Dave Liziewski seda tunnet ignoreerima?

Tema nimi? Kick-Ass!

Siiamaani on Dave olnud enam-vähem lootusetult armunud Katie Daeuxma’sse (Lyndsy Fonseca), kes omalt poolt ei ole vaest noormeest tähelegi pannud; ent kui Dave pärast esimest väga ebaõnnestunud superkangelase-tegu haiglasse viiakse (mis omakorda jõuab tänu nutitelefoni-tehnoloogiale Interneti viraalsesse maailma), hakkavad asjad vaikselt muutuma: peagi saab Kick-Ass’ist midagi enamat ja olukord võtab uue täiesti suuna, kui ta kohtub Big Daddy (Cage) ja tema mitte-just-vähe-ohtliku tütre Hit-Girl’iga (Moretz).

Kick-Ass on vägivaldne, vulgaarne ja igatpidi vastupidine kõikvõimalikele “päris” lugudele superkangelastest. Tegemist on fantastilise ajaviitega, mis oli 2010nda aasta üks oodatumaid filme ning on täiega mitte sobilik alaealistele ja nõrganärvilistele.
",
            "tagline"=>null,
            "released"=>"1970-01-01 02:00:00",
            "expires_at"=>null,
            "created_at"=>"2012-07-26 22:09:05",
            "updated_at"=>"2016-04-19 03:07:36",
            "views"=>"0",
            "rating"=>null,
            "imdb_rating"=>null,
            "rt_critics_rating"=>"76",
            "rt_audience_rating"=>"81",
            "type"=>"1",
            "episode_nr"=>null,
            "imdbrating"=>"7.8",
            "deleted"=>"0",
        ) );

        $this->insert("vod_title", array(
            "id"=>"59631",
            "md5"=>null,
            "title"=>"Ender's Game",
            "original_name"=>"Ender's Game",
            "alternative_name"=>null,
            "base_name"=>"ender-s-game",
            "parent_id"=>null,
            "author_id"=>"1",
            "provider_id"=>"7",
            "featured"=>"1",
            "approved"=>"1",
            "geo_restricted"=>"1",
            "broken"=>null,
            "ean"=>null,
            "vet"=>null,
            "price"=>"3.00",
            "popularity"=>null,
            "active"=>"1",
            "year"=>"2013",
            "agelimit"=>"12",
            "comment"=>null,
            "imdb_id"=>"tt1731141",
            "tmdb_id"=>"80274",
            "rt_id"=>"",
            "efi_id"=>null,
            "price_class_id"=>"1",
            "runtime"=>"114",
            "overview"=>"ENDERI MÄNG on Orson Scott Cardi samanimelisel menuromaanil põhinev seikluspõnevik, mille peaosas paar aastat tagasi Martin Scorsese imelises fantaasialoos \"Hugo\" nimiosalist kehastanud noor Asa Butterfield. Kaasa teevad Oscari-võitja Ben Kingsley (\"Hugo\", \"Raudmees 3\") ning terve plejaad nooremaid ja vanemaid Oscari-nominente: Harrison Ford (Indiana Jonesi seiklused), Hailee Steinfeld (\"Tõeline visadus\"), Abigail Breslin (\"Väike miss päikesepaiste\") ja Viola Davis (\"Vangistatud\", \"Koduabiline\").	

Aasta 2135. Inimkond on vaid ime läbi elanud üle kohutava tulnukrassi kaks rünnakut ja valmistub taas ohtliku vaenlase vastu astuma. Selleks, et tagada inimkonna ellujäämine asutatakse eriline sõjakool, kuhu saadetakse kõige andekamad lapsed juba varases nooruses. Nende laste hulgas on ka lootustandev noor sõjastrateeg Andrew (Ender) Wiggin, Maa rahvusvahelise laevastiku tulevane väejuht ja inimkonna ainus pääsemislootus.",
            "tagline"=>"This is not a game.",
            "released"=>"1970-01-01 02:00:00",
            "expires_at"=>"1970-01-01 02:00:00",
            "created_at"=>"2016-08-08 11:20:38",
            "updated_at"=>"2016-08-10 17:04:39",
            "views"=>"0",
            "rating"=>null,
            "imdb_rating"=>null,
            "rt_critics_rating"=>null,
            "rt_audience_rating"=>null,
            "type"=>"1",
            "episode_nr"=>null,
            "imdbrating"=>null,
            "deleted"=>"0",
        ) );

        $this->insert("vod_title", array(
            "id"=>"59632",
            "md5"=>null,
            "title"=>"Limitless",
            "original_name"=>"Limitless",
            "alternative_name"=>null,
            "base_name"=>"limitless",
            "parent_id"=>null,
            "author_id"=>"1",
            "provider_id"=>"7",
            "featured"=>"0",
            "approved"=>"1",
            "geo_restricted"=>"1",
            "broken"=>null,
            "ean"=>null,
            "vet"=>null,
            "price"=>"3.00",
            "popularity"=>null,
            "active"=>"1",
            "year"=>"2011",
            "agelimit"=>"15",
            "comment"=>null,
            "imdb_id"=>"tt1219289",
            "tmdb_id"=>"51876",
            "rt_id"=>"",
            "efi_id"=>null,
            "price_class_id"=>"1",
            "runtime"=>"105",
            "overview"=>"On tõestatud, et inimesed kasutavad umbes 20 protsenti nende ajumahust. Aga mis juhtuks, kui saaksid kasutada tervet mahtu? Ainult üks tablett ja sinust saab iseenda täiuslik versioon. Mida teeksid sina? Otsiksid kuulsust ja võimu? Kaugele läheksid?

Eddie Morra (Bradley Cooper) on kirjanik, kes elab New Yorgis ning töötab oma uue raamatu kallal juba üle kuue kuu, kuigi samas pole veel ühtegi lauset kirjutanud. Kui tema tüdruksõber Lindy (Abbie Cornish) ta maha jätab, arvab mees, et elu on läbi. Siis aga kohtab vana sõpra, kes tutvustab talle uut ravimit nimega NZT, mis aitab inimestel kasutada oma ajupotentsiaali täies mahus. 

Üks tablett päevas aitab Eddiel muutuda võitmatuks. Ta muutub intellektuaalsemaks ja atraktiivsemaks. Ta võib mõne tunniga õppida selgeks ükskõik mis keele, lõpetada oma raamatu nelja päevaga ja teenida aktsiabörsil miljoneid dollareid kümne päevaga. 
Kui endine “eikeegi” tõuseb tippu, tõmbab ta endale ärimoguli Carl Van Looni (Robert De Niro) tähelepanu, kes näeb Eddies võimalust teenimiseks. 
Aga igal rohul on oma kõrvalnähud…

“Kõrvalnähud” on pingeline põnevusfilm, mille aluseks Alan Glynn romaan “Tumedad väljad”. Lavastas Neil Burger (“Illusionist”), osades Bradley Cooper (“Pohmakas”), Robert De Niro (“Taksojuht”, “Raevunud härg”, “Ristiisa 2”), Abbie Cornish (“Sucker Punch – põgenemine reaalsusest”), Anna Friel (“Sa kohtad pikka tumedapäist tundmatut”) jt.",
            "tagline"=>"What if a pill could make you rich and powerful?",
            "released"=>"2016-08-30 16:13:00",
            "expires_at"=>"2016-08-30 16:13:00",
            "created_at"=>"2016-08-30 14:10:44",
            "updated_at"=>"2016-09-12 22:09:42",
            "views"=>"0",
            "rating"=>null,
            "imdb_rating"=>null,
            "rt_critics_rating"=>null,
            "rt_audience_rating"=>null,
            "type"=>"1",
            "episode_nr"=>null,
            "imdbrating"=>null,
            "deleted"=>"0",
        ) );

        $this->insert("vod_title", array(
            "id"=>"59660",
            "md5"=>null,
            "title"=>"Mercenaries",
            "original_name"=>"Mercenaries",
            "alternative_name"=>null,
            "base_name"=>"mercenaries-1970",
            "parent_id"=>null,
            "author_id"=>"1",
            "provider_id"=>"7",
            "featured"=>"1",
            "approved"=>"1",
            "geo_restricted"=>"1",
            "broken"=>null,
            "ean"=>null,
            "vet"=>null,
            "price"=>"3.00",
            "popularity"=>null,
            "active"=>"1",
            "year"=>"2014",
            "agelimit"=>null,
            "comment"=>null,
            "imdb_id"=>"tt3598222",
            "tmdb_id"=>"277597",
            "rt_id"=>"",
            "efi_id"=>null,
            "price_class_id"=>"1",
            "runtime"=>"90",
            "overview"=>"Kui Presidendi Tütar sõjatsoonis vangistatakse, annab USA valitsus käsu moodustada päästeoperatsiooniks eliitmeeskond.

Kahjuks hoitakse teda naistevanglas ja valitsus on sunnitud lahingüksuse moodustama kõige vägivaldsematest naisvangidest. Iga naissõdur on oma ala halastamatu ekspert. 

Neil õnnestub vanglasse pääseda ja algab võitlus Presidendi tütre vabastamiseks.",
            "tagline"=>"They're the Best Man for the job.",
            "released"=>"1970-01-01 02:00:00",
            "expires_at"=>null,
            "created_at"=>"2017-01-02 14:19:40",
            "updated_at"=>"2017-01-02 14:24:23",
            "views"=>"0",
            "rating"=>null,
            "imdb_rating"=>null,
            "rt_critics_rating"=>null,
            "rt_audience_rating"=>null,
            "type"=>"1",
            "episode_nr"=>null,
            "imdbrating"=>null,
            "deleted"=>"0",
        ) );




        // Data for table 'vod_title_genre_group'



        // Data for table 'vod_title_priceclass'



        // Data for table 'vod_tmdb_import_log'



        // Data for table 'vod_tmdb_movie_attributes'



        // Data for table 'vod_tmdb_search_log'



        // Data for table 'vod_transcoder_jobs'



        // Data for table 'vod_user'
        $this->insert("vod_user", array(
            "id"=>"1",
            "username"=>"admin",
            "password"=>"430d1ba57fa5df792166b1d94fbca996",
            "activationKey"=>"",
            "fb_access_token"=>null,
            "createtime"=>"2016-03-13 16:11:30",
            "lastvisit"=>"2010-01-01 00:00:00",
            "lastaction"=>"0000-00-00 00:00:00",
            "lastpasswordchange"=>"1458292235",
            "superuser"=>"1",
            "status"=>"3",
            "avatar"=>null,
            "expires_at"=>null,
            "notifyType"=>"Instant",
        ) );

        $this->insert("vod_user", array(
            "id"=>"2",
            "username"=>"demo",
            "password"=>"fe01ce2a7fbac8fafaed7c982a04e229",
            "activationKey"=>"e7c2ba786ab7b00f922cda0b9946eaf9",
            "fb_access_token"=>null,
            "createtime"=>"2012-07-10 19:41:56",
            "lastvisit"=>"2012-07-10 19:41:56",
            "lastaction"=>"2011-12-29 00:43:49",
            "lastpasswordchange"=>"0",
            "superuser"=>"0",
            "status"=>"3",
            "avatar"=>null,
            "expires_at"=>null,
            "notifyType"=>"Instant",
        ) );




        // Data for table 'vod_user_access_token'



        // Data for table 'vod_user_action'
        $this->insert("vod_user_action", array(
            "id"=>"1",
            "title"=>"message_write",
            "comment"=>null,
            "subject"=>"message",
            "monitor"=>null,
            "category"=>"info",
            "alert"=>null,
            "threshold_times"=>null,
            "threshold_hour"=>null,
        ) );

        $this->insert("vod_user_action", array(
            "id"=>"2",
            "title"=>"message_receive",
            "comment"=>null,
            "subject"=>"message",
            "monitor"=>null,
            "category"=>"info",
            "alert"=>null,
            "threshold_times"=>null,
            "threshold_hour"=>null,
        ) );

        $this->insert("vod_user_action", array(
            "id"=>"3",
            "title"=>"registered_user_created",
            "comment"=>null,
            "subject"=>"user",
            "monitor"=>null,
            "category"=>"info",
            "alert"=>null,
            "threshold_times"=>null,
            "threshold_hour"=>null,
        ) );

        $this->insert("vod_user_action", array(
            "id"=>"4",
            "title"=>"anonymous_user_created",
            "comment"=>null,
            "subject"=>null,
            "monitor"=>null,
            "category"=>"info",
            "alert"=>null,
            "threshold_times"=>null,
            "threshold_hour"=>null,
        ) );

        $this->insert("vod_user_action", array(
            "id"=>"5",
            "title"=>"logged_in",
            "comment"=>"User logged in site.
",
            "subject"=>"user",
            "monitor"=>null,
            "category"=>"info",
            "alert"=>null,
            "threshold_times"=>null,
            "threshold_hour"=>null,
        ) );

        $this->insert("vod_user_action", array(
            "id"=>"6",
            "title"=>"activation_request",
            "comment"=>"The initial request for getting authentication token was commited.",
            "subject"=>"user",
            "monitor"=>null,
            "category"=>"info",
            "alert"=>null,
            "threshold_times"=>null,
            "threshold_hour"=>null,
        ) );

        $this->insert("vod_user_action", array(
            "id"=>"14",
            "title"=>"purchase_event",
            "comment"=>"User has made an purchase.",
            "subject"=>null,
            "monitor"=>null,
            "category"=>"money",
            "alert"=>null,
            "threshold_times"=>null,
            "threshold_hour"=>null,
        ) );

        $this->insert("vod_user_action", array(
            "id"=>"7",
            "title"=>"stream_start",
            "comment"=>"User has requested stream from the player",
            "subject"=>"player",
            "monitor"=>null,
            "category"=>"info",
            "alert"=>null,
            "threshold_times"=>null,
            "threshold_hour"=>null,
        ) );

        $this->insert("vod_user_action", array(
            "id"=>"8",
            "title"=>"user_failed_bandwidth_test",
            "comment"=>"User did not pass the bandwidth test.",
            "subject"=>"user",
            "monitor"=>null,
            "category"=>"info",
            "alert"=>null,
            "threshold_times"=>null,
            "threshold_hour"=>null,
        ) );

        $this->insert("vod_user_action", array(
            "id"=>"9",
            "title"=>"session_reauthorized",
            "comment"=>"Session was authenticated successfully from another place",
            "subject"=>"player",
            "monitor"=>null,
            "category"=>"info",
            "alert"=>null,
            "threshold_times"=>null,
            "threshold_hour"=>null,
        ) );

        $this->insert("vod_user_action", array(
            "id"=>"10",
            "title"=>"bill_created",
            "comment"=>"Payment was verified and accepted bill with all the transaction info was generated.",
            "subject"=>"payment",
            "monitor"=>null,
            "category"=>"info",
            "alert"=>null,
            "threshold_times"=>null,
            "threshold_hour"=>null,
        ) );

        $this->insert("vod_user_action", array(
            "id"=>"11",
            "title"=>"ticket_created",
            "comment"=>"Ticket with the authentication info for the service was generated and the unlock code was given to client. Ticket authorizes user to start streaming session.
",
            "subject"=>"ticket",
            "monitor"=>null,
            "category"=>"info",
            "alert"=>null,
            "threshold_times"=>null,
            "threshold_hour"=>null,
        ) );

        $this->insert("vod_user_action", array(
            "id"=>"12",
            "title"=>"session_created",
            "comment"=>"A streaming session has been created for user",
            "subject"=>"player",
            "monitor"=>null,
            "category"=>"info",
            "alert"=>null,
            "threshold_times"=>null,
            "threshold_hour"=>null,
        ) );

        $this->insert("vod_user_action", array(
            "id"=>"13",
            "title"=>"ticket_balance_update",
            "comment"=>"User balance has changed.",
            "subject"=>null,
            "monitor"=>null,
            "category"=>"money",
            "alert"=>null,
            "threshold_times"=>null,
            "threshold_hour"=>null,
        ) );

        $this->insert("vod_user_action", array(
            "id"=>"15",
            "title"=>"ticket_activated",
            "comment"=>"Ticket has been activated by user.",
            "subject"=>null,
            "monitor"=>null,
            "category"=>"info",
            "alert"=>null,
            "threshold_times"=>null,
            "threshold_hour"=>null,
        ) );

        $this->insert("vod_user_action", array(
            "id"=>"16",
            "title"=>"token_authentication",
            "comment"=>"User has authenticated with token.",
            "subject"=>null,
            "monitor"=>null,
            "category"=>"info",
            "alert"=>null,
            "threshold_times"=>null,
            "threshold_hour"=>null,
        ) );

        $this->insert("vod_user_action", array(
            "id"=>"17",
            "title"=>"film_cookie_created",
            "comment"=>"After a purchase, user will receive a cookie on the browser, which will be recognized in the frontend.",
            "subject"=>"user",
            "monitor"=>null,
            "category"=>"info",
            "alert"=>null,
            "threshold_times"=>null,
            "threshold_hour"=>null,
        ) );

        $this->insert("vod_user_action", array(
            "id"=>"18",
            "title"=>"app_user_created",
            "comment"=>null,
            "subject"=>"App user was created",
            "monitor"=>null,
            "category"=>"info",
            "alert"=>null,
            "threshold_times"=>null,
            "threshold_hour"=>null,
        ) );

        $this->insert("vod_user_action", array(
            "id"=>"19",
            "title"=>"error",
            "comment"=>"Generic error",
            "subject"=>"error",
            "monitor"=>null,
            "category"=>"info",
            "alert"=>null,
            "threshold_times"=>null,
            "threshold_hour"=>null,
        ) );




        // Data for table 'vod_user_activity'



        // Data for table 'vod_user_friendship'
        $this->insert("vod_user_friendship", array(
            "inviter_id"=>"1",
            "friend_id"=>"2",
            "status"=>"2",
            "acknowledgetime"=>"1319489480",
            "requesttime"=>"1319481626",
            "updatetime"=>"1319489480",
            "message"=>"asdasdas",
        ) );




        // Data for table 'vod_user_group'



        // Data for table 'vod_user_has_role'
        $this->insert("vod_user_has_role", array(
            "user_id"=>"2",
            "role_id"=>"3",
        ) );

        $this->insert("vod_user_has_role", array(
            "user_id"=>"1",
            "role_id"=>"7",
        ) );




        // Data for table 'vod_user_has_usergroup'



        // Data for table 'vod_user_membership'
        $this->insert("vod_user_membership", array(
            "id"=>"1",
            "membership_id"=>"4",
            "user_id"=>"1",
            "payment_id"=>"1",
            "order_date"=>"1320654734",
            "end_date"=>"18446400",
            "payment_date"=>"1417395997",
        ) );




        // Data for table 'vod_user_messages'



        // Data for table 'vod_user_payment'
        $this->insert("vod_user_payment", array(
            "id"=>"1",
            "title"=>"Prepayment",
            "text"=>"The money is paid prior watching the title",
        ) );

        $this->insert("vod_user_payment", array(
            "id"=>"2",
            "title"=>"Code",
            "text"=>"Purchase made with code",
        ) );




        // Data for table 'vod_user_permission'
        $this->insert("vod_user_permission", array(
            "principal_id"=>"3",
            "subordinate_id"=>"0",
            "type"=>"role",
            "action"=>"1",
            "template"=>"0",
            "comment"=>"Users can write messagse",
        ) );

        $this->insert("vod_user_permission", array(
            "principal_id"=>"3",
            "subordinate_id"=>"0",
            "type"=>"role",
            "action"=>"2",
            "template"=>"0",
            "comment"=>"Users can receive messagse",
        ) );

        $this->insert("vod_user_permission", array(
            "principal_id"=>"3",
            "subordinate_id"=>"0",
            "type"=>"role",
            "action"=>"3",
            "template"=>"0",
            "comment"=>"Users are able to view visits of his profile",
        ) );

        $this->insert("vod_user_permission", array(
            "principal_id"=>"7",
            "subordinate_id"=>"0",
            "type"=>"user",
            "action"=>"1",
            "template"=>"0",
            "comment"=>"",
        ) );

        $this->insert("vod_user_permission", array(
            "principal_id"=>"7",
            "subordinate_id"=>"0",
            "type"=>"role",
            "action"=>"1",
            "template"=>"0",
            "comment"=>"",
        ) );




        // Data for table 'vod_user_privacysetting'
        $this->insert("vod_user_privacysetting", array(
            "user_id"=>"1",
            "message_new_friendship"=>"1",
            "message_new_message"=>"1",
            "message_new_profilecomment"=>"1",
            "appear_in_search"=>"1",
            "show_online_status"=>"1",
            "log_profile_visits"=>"1",
            "ignore_users"=>"",
            "public_profile_fields"=>"55",
        ) );

        $this->insert("vod_user_privacysetting", array(
            "user_id"=>"2",
            "message_new_friendship"=>"0",
            "message_new_message"=>"1",
            "message_new_profilecomment"=>"0",
            "appear_in_search"=>"1",
            "show_online_status"=>"1",
            "log_profile_visits"=>"1",
            "ignore_users"=>"",
            "public_profile_fields"=>"0",
        ) );

        $this->insert("vod_user_privacysetting", array(
            "user_id"=>"3",
            "message_new_friendship"=>"1",
            "message_new_message"=>"1",
            "message_new_profilecomment"=>"1",
            "appear_in_search"=>"1",
            "show_online_status"=>"1",
            "log_profile_visits"=>"1",
            "ignore_users"=>"",
            "public_profile_fields"=>null,
        ) );




        // Data for table 'vod_user_profile_comment'



        // Data for table 'vod_user_profile_fields'
        $this->insert("vod_user_profile_fields", array(
            "id"=>"1",
            "field_group_id"=>"2",
            "varname"=>"email",
            "title"=>"E-Mail",
            "hint"=>"",
            "field_type"=>"VARCHAR",
            "field_size"=>"255",
            "field_size_min"=>"0",
            "required"=>"1",
            "match"=>"",
            "range"=>"",
            "error_message"=>"",
            "other_validator"=>"CEmailValidator",
            "default"=>"",
            "position"=>"0",
            "visible"=>"2",
            "related_field_name"=>"",
        ) );

        $this->insert("vod_user_profile_fields", array(
            "id"=>"2",
            "field_group_id"=>"2",
            "varname"=>"firstname",
            "title"=>"First name",
            "hint"=>"",
            "field_type"=>"VARCHAR",
            "field_size"=>"255",
            "field_size_min"=>"0",
            "required"=>"0",
            "match"=>"",
            "range"=>"",
            "error_message"=>"",
            "other_validator"=>"",
            "default"=>"",
            "position"=>"0",
            "visible"=>"3",
            "related_field_name"=>"",
        ) );

        $this->insert("vod_user_profile_fields", array(
            "id"=>"3",
            "field_group_id"=>"2",
            "varname"=>"lastname",
            "title"=>"Last name",
            "hint"=>"",
            "field_type"=>"VARCHAR",
            "field_size"=>"255",
            "field_size_min"=>"0",
            "required"=>"0",
            "match"=>"",
            "range"=>"",
            "error_message"=>"",
            "other_validator"=>"",
            "default"=>"",
            "position"=>"0",
            "visible"=>"3",
            "related_field_name"=>"",
        ) );

        $this->insert("vod_user_profile_fields", array(
            "id"=>"4",
            "field_group_id"=>"0",
            "varname"=>"mobile",
            "title"=>"Mobile",
            "hint"=>"",
            "field_type"=>"VARCHAR",
            "field_size"=>"255",
            "field_size_min"=>"0",
            "required"=>"0",
            "match"=>"",
            "range"=>"",
            "error_message"=>"",
            "other_validator"=>"",
            "default"=>"",
            "position"=>"0",
            "visible"=>"3",
            "related_field_name"=>"",
        ) );

        $this->insert("vod_user_profile_fields", array(
            "id"=>"8",
            "field_group_id"=>"1",
            "varname"=>"balance",
            "title"=>"Balance",
            "hint"=>"",
            "field_type"=>"VARCHAR",
            "field_size"=>"128",
            "field_size_min"=>"0",
            "required"=>"0",
            "match"=>"",
            "range"=>"",
            "error_message"=>"",
            "other_validator"=>"",
            "default"=>"",
            "position"=>"0",
            "visible"=>"1",
            "related_field_name"=>"",
        ) );

        $this->insert("vod_user_profile_fields", array(
            "id"=>"10",
            "field_group_id"=>"1",
            "varname"=>"purchase_history",
            "title"=>"Purchase History",
            "hint"=>"",
            "field_type"=>"TEXT",
            "field_size"=>"0",
            "field_size_min"=>"0",
            "required"=>"0",
            "match"=>"",
            "range"=>"",
            "error_message"=>"",
            "other_validator"=>"",
            "default"=>"",
            "position"=>"0",
            "visible"=>"1",
            "related_field_name"=>"",
        ) );

        $this->insert("vod_user_profile_fields", array(
            "id"=>"11",
            "field_group_id"=>"1",
            "varname"=>"tickets",
            "title"=>"Purchase History",
            "hint"=>"",
            "field_type"=>"TEXT",
            "field_size"=>"0",
            "field_size_min"=>"0",
            "required"=>"0",
            "match"=>"",
            "range"=>"",
            "error_message"=>"",
            "other_validator"=>"",
            "default"=>"",
            "position"=>"0",
            "visible"=>"1",
            "related_field_name"=>"",
        ) );

        $this->insert("vod_user_profile_fields", array(
            "id"=>"12",
            "field_group_id"=>"1",
            "varname"=>"favorites",
            "title"=>"Favorite Films",
            "hint"=>"",
            "field_type"=>"TEXT",
            "field_size"=>"128",
            "field_size_min"=>"0",
            "required"=>"0",
            "match"=>"",
            "range"=>"",
            "error_message"=>"",
            "other_validator"=>"",
            "default"=>"",
            "position"=>"0",
            "visible"=>"0",
            "related_field_name"=>"",
        ) );

        $this->insert("vod_user_profile_fields", array(
            "id"=>"13",
            "field_group_id"=>"2",
            "varname"=>"messages",
            "title"=>"Message Count",
            "hint"=>"",
            "field_type"=>"INTEGER",
            "field_size"=>"11",
            "field_size_min"=>"0",
            "required"=>"0",
            "match"=>"",
            "range"=>"",
            "error_message"=>"",
            "other_validator"=>"",
            "default"=>"",
            "position"=>"0",
            "visible"=>"0",
            "related_field_name"=>"",
        ) );

        $this->insert("vod_user_profile_fields", array(
            "id"=>"14",
            "field_group_id"=>"0",
            "varname"=>"sent_tickets",
            "title"=>"All sent gifts",
            "hint"=>"",
            "field_type"=>"TEXT",
            "field_size"=>"0",
            "field_size_min"=>"0",
            "required"=>"0",
            "match"=>"",
            "range"=>"",
            "error_message"=>"",
            "other_validator"=>"",
            "default"=>"",
            "position"=>"0",
            "visible"=>"0",
            "related_field_name"=>"",
        ) );

        $this->insert("vod_user_profile_fields", array(
            "id"=>"15",
            "field_group_id"=>"0",
            "varname"=>"received_gifts",
            "title"=>"Received Gifts",
            "hint"=>"",
            "field_type"=>"TEXT",
            "field_size"=>"0",
            "field_size_min"=>"0",
            "required"=>"0",
            "match"=>"",
            "range"=>"",
            "error_message"=>"",
            "other_validator"=>"",
            "default"=>"",
            "position"=>"0",
            "visible"=>"0",
            "related_field_name"=>"",
        ) );

        $this->insert("vod_user_profile_fields", array(
            "id"=>"16",
            "field_group_id"=>"2",
            "varname"=>"subscription",
            "title"=>"Subscription",
            "hint"=>"",
            "field_type"=>"INTEGER",
            "field_size"=>"4",
            "field_size_min"=>"0",
            "required"=>"0",
            "match"=>"",
            "range"=>"",
            "error_message"=>"",
            "other_validator"=>"",
            "default"=>"",
            "position"=>"0",
            "visible"=>"0",
            "related_field_name"=>"",
        ) );

        $this->insert("vod_user_profile_fields", array(
            "id"=>"17",
            "field_group_id"=>"2",
            "varname"=>"distributor_id",
            "title"=>"Distributor",
            "hint"=>"",
            "field_type"=>"INTEGER",
            "field_size"=>"0",
            "field_size_min"=>"0",
            "required"=>"0",
            "match"=>"",
            "range"=>"",
            "error_message"=>"",
            "other_validator"=>"",
            "default"=>"",
            "position"=>"0",
            "visible"=>"0",
            "related_field_name"=>"",
        ) );

        $this->insert("vod_user_profile_fields", array(
            "id"=>"18",
            "field_group_id"=>"0",
            "varname"=>"active_sessions",
            "title"=>"Active Sessions",
            "hint"=>"Displays the current information on the paired devices (TV, mobile)",
            "field_type"=>"TEXT",
            "field_size"=>"0",
            "field_size_min"=>"0",
            "required"=>"0",
            "match"=>"",
            "range"=>"",
            "error_message"=>"",
            "other_validator"=>"",
            "default"=>"",
            "position"=>"0",
            "visible"=>"0",
            "related_field_name"=>"",
        ) );

        $this->insert("vod_user_profile_fields", array(
            "id"=>"19",
            "field_group_id"=>"0",
            "varname"=>"role",
            "title"=>"Role of the user",
            "hint"=>"",
            "field_type"=>"VARCHAR",
            "field_size"=>"64",
            "field_size_min"=>"0",
            "required"=>"0",
            "match"=>"",
            "range"=>"",
            "error_message"=>"",
            "other_validator"=>"",
            "default"=>"",
            "position"=>"0",
            "visible"=>"0",
            "related_field_name"=>"",
        ) );

        $this->insert("vod_user_profile_fields", array(
            "id"=>"20",
            "field_group_id"=>"0",
            "varname"=>"profile_picture",
            "title"=>"Profile picture",
            "hint"=>"",
            "field_type"=>"VARCHAR",
            "field_size"=>"255",
            "field_size_min"=>"0",
            "required"=>"0",
            "match"=>"",
            "range"=>"",
            "error_message"=>"",
            "other_validator"=>"",
            "default"=>"http://gonzales.vifi.ee/images/anonymous_avatar.jpg",
            "position"=>"0",
            "visible"=>"4",
            "related_field_name"=>"",
        ) );

        $this->insert("vod_user_profile_fields", array(
            "id"=>"21",
            "field_group_id"=>"2",
            "varname"=>"language",
            "title"=>"Language",
            "hint"=>"",
            "field_type"=>"VARCHAR",
            "field_size"=>"2",
            "field_size_min"=>"0",
            "required"=>"0",
            "match"=>"",
            "range"=>"",
            "error_message"=>"",
            "other_validator"=>"",
            "default"=>"",
            "position"=>"0",
            "visible"=>"2",
            "related_field_name"=>"",
        ) );

        $this->insert("vod_user_profile_fields", array(
            "id"=>"22",
            "field_group_id"=>"0",
            "varname"=>"subscriptions",
            "title"=>"Subscriptions",
            "hint"=>"",
            "field_type"=>"TEXT",
            "field_size"=>"255",
            "field_size_min"=>"0",
            "required"=>"0",
            "match"=>"",
            "range"=>"",
            "error_message"=>"",
            "other_validator"=>"",
            "default"=>"",
            "position"=>"0",
            "visible"=>"0",
            "related_field_name"=>"",
        ) );

        $this->insert("vod_user_profile_fields", array(
            "id"=>"24",
            "field_group_id"=>"2",
            "varname"=>"newsletter",
            "title"=>"Newsletter",
            "hint"=>"",
            "field_type"=>"RANGE",
            "field_size"=>"2",
            "field_size_min"=>"0",
            "required"=>"0",
            "match"=>"",
            "range"=>"yes,no",
            "error_message"=>"",
            "other_validator"=>"",
            "default"=>"",
            "position"=>"0",
            "visible"=>"2",
            "related_field_name"=>"",
        ) );




        // Data for table 'vod_user_profile_fields_group'
        $this->insert("vod_user_profile_fields_group", array(
            "id"=>"1",
            "group_name"=>"active_tickets",
            "title"=>"Active Subscriptions",
            "position"=>"0",
        ) );

        $this->insert("vod_user_profile_fields_group", array(
            "id"=>"2",
            "group_name"=>"general",
            "title"=>"General",
            "position"=>"0",
        ) );

        $this->insert("vod_user_profile_fields_group", array(
            "id"=>"3",
            "group_name"=>"favorites",
            "title"=>"Favorite films, actors, genres",
            "position"=>"0",
        ) );

        $this->insert("vod_user_profile_fields_group", array(
            "id"=>"4",
            "group_name"=>"purchase_history",
            "title"=>"Purchase history",
            "position"=>"0",
        ) );

        $this->insert("vod_user_profile_fields_group", array(
            "id"=>"5",
            "group_name"=>"comments",
            "title"=>"Comments",
            "position"=>"0",
        ) );

        $this->insert("vod_user_profile_fields_group", array(
            "id"=>"6",
            "group_name"=>"ratings",
            "title"=>"Ratings",
            "position"=>"0",
        ) );




        // Data for table 'vod_user_profile_visit'



        // Data for table 'vod_user_profiles'
        $this->insert("vod_user_profiles", array(
            "id"=>"1",
            "user_id"=>"1",
            "timestamp"=>"2014-12-01 02:59:53",
            "privacy"=>"protected",
            "lastname"=>"admin",
            "firstname"=>"admin",
            "show_friends"=>"2",
            "allow_comments"=>"1",
            "email"=>"webmaster@example.com",
            "age"=>null,
            "city"=>null,
            "balance"=>"",
            "tickets"=>"",
            "purchase_history"=>"",
            "favorites"=>"",
            "messages"=>"0",
            "sent_tickets"=>"",
            "received_gifts"=>"",
            "newsletter"=>"0",
            "other_marketing"=>"0",
            "ratings"=>null,
            "subscription"=>"0",
            "distributor_id"=>"11",
            "active_sessions"=>"",
            "role"=>"",
            "profile_picture"=>"",
            "language"=>"",
            "subscriptions"=>"",
            "active_subscriptions"=>"",
            "mobile"=>null,
        ) );

        $this->insert("vod_user_profiles", array(
            "id"=>"2",
            "user_id"=>"2",
            "timestamp"=>"2014-12-01 02:59:53",
            "privacy"=>"protected",
            "lastname"=>"demo",
            "firstname"=>"demo",
            "show_friends"=>"0",
            "allow_comments"=>"1",
            "email"=>"demo@example.com",
            "age"=>"0",
            "city"=>null,
            "balance"=>"12",
            "tickets"=>"a:3:{i:0;a:9:{s:2:\"id\";s:1:\"1\";s:7:\"user_id\";s:2:\"46\";s:7:\"bill_id\";s:1:\"1\";s:9:\"auth_code\";s:8:\"44917919\";s:9:\"validfrom\";s:19:\"2011-11-08 18:23:03\";s:7:\"validto\";s:19:\"2011-11-08 18:23:03\";s:6:\"active\";s:1:\"0\";s:10:\"created_at\";s:19:\"2011-11-08 18:23:0",
            "purchase_history"=>"",
            "favorites"=>"",
            "messages"=>"0",
            "sent_tickets"=>"",
            "received_gifts"=>"",
            "newsletter"=>"0",
            "other_marketing"=>"0",
            "ratings"=>null,
            "subscription"=>"0",
            "distributor_id"=>"11",
            "active_sessions"=>"",
            "role"=>"",
            "profile_picture"=>"",
            "language"=>"",
            "subscriptions"=>"",
            "active_subscriptions"=>"",
            "mobile"=>null,
        ) );




        // Data for table 'vod_user_roles'
        $this->insert("vod_user_roles", array(
            "id"=>"7",
            "title"=>"Anonymous customer",
            "description"=>"Customer with only e-mail address as contact info",
            "selectable"=>"0",
            "searchable"=>"1",
            "autoassign"=>"0",
            "is_membership_possible"=>"1",
            "price"=>"0",
            "duration"=>"2",
        ) );

        $this->insert("vod_user_roles", array(
            "id"=>"8",
            "title"=>"Registered customer",
            "description"=>"User has a dedicated profile and user account.",
            "selectable"=>"1",
            "searchable"=>"1",
            "autoassign"=>"0",
            "is_membership_possible"=>"0",
            "price"=>null,
            "duration"=>"365",
        ) );

        $this->insert("vod_user_roles", array(
            "id"=>"9",
            "title"=>"Distributor",
            "description"=>"",
            "selectable"=>"1",
            "searchable"=>"0",
            "autoassign"=>"0",
            "is_membership_possible"=>"0",
            "price"=>null,
            "duration"=>null,
        ) );

        $this->insert("vod_user_roles", array(
            "id"=>"10",
            "title"=>"Content Provider",
            "description"=>"Content Provider",
            "selectable"=>"1",
            "searchable"=>"0",
            "autoassign"=>"0",
            "is_membership_possible"=>"0",
            "price"=>null,
            "duration"=>null,
        ) );

        $this->insert("vod_user_roles", array(
            "id"=>"11",
            "title"=>"TV-app user",
            "description"=>"User with no contact information, authenticated by Device-id",
            "selectable"=>"0",
            "searchable"=>"0",
            "autoassign"=>"0",
            "is_membership_possible"=>"1",
            "price"=>null,
            "duration"=>null,
        ) );

        $this->insert("vod_user_roles", array(
            "id"=>"12",
            "title"=>"Maintenance",
            "description"=>"Maintenance accounts for CMS",
            "selectable"=>"1",
            "searchable"=>"0",
            "autoassign"=>"0",
            "is_membership_possible"=>"0",
            "price"=>null,
            "duration"=>null,
        ) );




        // Data for table 'vod_user_session'



        // Data for table 'vod_user_settings'
        $this->insert("vod_user_settings", array(
            "id"=>"1",
            "title"=>"Default",
            "is_active"=>"1",
            "preserveProfiles"=>"1",
            "enableAvatar"=>"1",
            "registrationType"=>"4",
            "enableRecovery"=>"1",
            "enableProfileHistory"=>"1",
            "messageSystem"=>"Dialog",
            "notifyType"=>"Instant",
            "password_expiration_time"=>"30",
            "readOnlyProfiles"=>"0",
            "loginType"=>"11",
            "notifyemailchange"=>"",
            "enableCaptcha"=>"1",
            "ldap_host"=>"",
            "ldap_port"=>null,
            "ldap_basedn"=>"",
            "ldap_protocol"=>"3",
            "ldap_autocreate"=>"1",
            "ldap_tls"=>"0",
            "ldap_transfer_attr"=>"1",
            "ldap_transfer_pw"=>"0",
        ) );




        // Data for table 'vod_user_subscription'



        // Data for table 'vod_user_textsettings'
        $this->insert("vod_user_textsettings", array(
            "id"=>"1",
            "language"=>"en",
            "text_registration_header"=>"Welcome to service!
",
            "text_registration_footer"=>"When registering at this System, you automatically accept our terms.",
            "text_login_header"=>"",
            "text_login_footer"=>"",
            "text_email_registration"=>"Hi!

You have been successfully registered to Vifi!
You can now login to the <a href=\"{url}\">service</a> with your credentials.
",
            "subject_email_registration"=>"Registration confirmation",
            "subject_email_recovery"=>"Your reset password information.",
            "text_email_recovery"=>"You have requested a new password our site.

Please go to <a href=\"{reset_url}\">{reset_url}</a> to reset your password.

Thank you!
Vifi.ee
",
            "text_email_activation"=>"Your account has been activated. Thank you for your registration.",
            "text_friendship_new"=>"New friendship Request from {username}: {message}. To accept or ignore this request, go to your friendship page: {link_friends} or go to your profile: {link_profile}",
            "text_friendship_confirmed"=>"The User {username} has accepted your friendship request",
            "text_profilecomment_new"=>"You have a new notification from {username}: {message}",
            "text_message_new"=>"You have received a new message from {username}: {message}",
            "text_membership_ordered"=>"Your membership has been activated on {order_date} You have choosen the payment style {payment}.",
            "text_payment_arrived"=>"<br/>
Tere!

Oled ostnud filmi <a href=\"{product_url}\">{title}</a>

Piletikood on {activation_code}

Piletikood on ühendusepõhine ja see kehtib kuni {valid_to}.

Piletikoodiga saad filmi vaadata nii:

Vali film, mille eest maksid. Vajuta osta lingile \"Vaata videot\" ja vali nimekirjast \"Kood\". Seejärel sisesta 

saadud piletikood ning vajuta nupule \"Vaata filmi\" ja valitud film käivitub.

Häid elamusi!

Filmilaenutus
",
            "subject_payment_arrived"=>"Filmilaenutuse pilet",
            "text_membership_header"=>"Membership activated",
            "text_membership_footer"=>"Your advantages: <br /> None",
            "text_purchase_successful"=>"You have purchased {{ title }}. We have sent you an e-mail containing order information and recovery code.",
        ) );

        $this->insert("vod_user_textsettings", array(
            "id"=>"2",
            "language"=>"est",
            "text_registration_header"=>"Welcome to System!
",
            "text_registration_footer"=>"",
            "text_login_header"=>"",
            "text_login_footer"=>"",
            "text_email_registration"=>"You have been successfully registered, visit your profile at {profile_url}",
            "subject_email_registration"=>"You have registered successfully",
            "subject_email_recovery"=>null,
            "text_email_recovery"=>"You have requested a new password our site.

Please go to <a href=\"{reset_url}\">{reset_url}</a> to reset your password.

Thank you!
Vifi.ee
",
            "text_email_activation"=>"Your account has been activated. Thank you for your registration.",
            "text_friendship_new"=>"",
            "text_friendship_confirmed"=>null,
            "text_profilecomment_new"=>"",
            "text_message_new"=>null,
            "text_membership_ordered"=>"Your subscription has been activated on {order_date} You have choosen the payment style {payment}.",
            "text_payment_arrived"=>"<br/>
Hi!

You have purchased <a href=\"{product_url}\">{title}</a> on {payment_date} and your ticket is now active until {valid_to}. 

You can use activation this activation code to view the film: {activation_code}

Happy watching!",
            "subject_payment_arrived"=>"Your purchase confirmation.",
            "text_membership_header"=>"Membership activated",
            "text_membership_footer"=>"",
            "text_purchase_successful"=>"You have purchased {{ title }}. We have sent you an e-mail containing order information and recovery code.",
        ) );

        $this->insert("vod_user_textsettings", array(
            "id"=>"3",
            "language"=>"fi",
            "text_registration_header"=>"",
            "text_registration_footer"=>"",
            "text_login_header"=>"",
            "text_login_footer"=>"",
            "text_email_registration"=>"",
            "subject_email_registration"=>"",
            "subject_email_recovery"=>null,
            "text_email_recovery"=>"",
            "text_email_activation"=>"",
            "text_friendship_new"=>"",
            "text_friendship_confirmed"=>null,
            "text_profilecomment_new"=>"",
            "text_message_new"=>null,
            "text_membership_ordered"=>"",
            "text_payment_arrived"=>"",
            "subject_payment_arrived"=>"",
            "text_membership_header"=>"",
            "text_membership_footer"=>"",
            "text_purchase_successful"=>null,
        ) );




        // Data for table 'vod_usergroup'



        // Data for table 'vod_videos'

	}

	public function safeDown() {
		echo 'Migration down not supported.';
	}

}

?>
