<?php

/**
 * Created with https://github.com/schmunk42/database-command
 */

class m170206_022213_dump extends CDbMigration {

	public function safeUp() {
        if ($this->dbConnection->schema instanceof CMysqlSchema) {
           $options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
        } else {
           $options = '';
        }




        // Schema for table 'vod_archived'
        $this->createTable("vod_archived", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "model_name"=>"varchar(64) NOT NULL",
            "model_id"=>"int(11) NOT NULL",
            "model_data"=>"int(11) NOT NULL",
            "created_at"=>"timestamp NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_banner'
        $this->createTable("vod_banner", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "header"=>"varchar(255)",
            "text"=>"text",
            "url"=>"varchar(255)",
            "style"=>"varchar(255)",
            "background_image"=>"varchar(255)",
            "img_id"=>"int(11)",
            "css_class"=>"varchar(128)",
            "active"=>"tinyint(2) NOT NULL",
            "order"=>"int(11) NOT NULL",
            "updated_at"=>"timestamp",
            "created_at"=>"timestamp NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_billing_provider'
        $this->createTable("vod_billing_provider", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name"=>"varchar(128)",
            "is_active"=>"tinyint(4)",
            "price_adjustment"=>"decimal(8,4) DEFAULT '0.0000'",
            ), 
        $options);


        // Schema for table 'vod_campaign'
        $this->createTable("vod_campaign", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name"=>"varchar(192) NOT NULL",
            "valid_from"=>"timestamp NOT NULL",
            "valid_to"=>"timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'",
            "price_class_id"=>"int(11) NOT NULL",
            "created_at"=>"datetime NOT NULL",
            "updated_at"=>"datetime NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_campaign_distributor'
        $this->createTable("vod_campaign_distributor", 
            array(
            "campaign_id"=>"int(11) NOT NULL",
            "distributor_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_campaign_package'
        $this->createTable("vod_campaign_package", 
            array(
            "campaign_id"=>"int(11) NOT NULL",
            "package_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_campaign_ticket'
        $this->createTable("vod_campaign_ticket", 
            array(
            "campaign_id"=>"int(11) NOT NULL",
            "ticket_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_campaign_title'
        $this->createTable("vod_campaign_title", 
            array(
            "campaign_id"=>"int(11) NOT NULL",
            "vod_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_comment'
        $this->createTable("vod_comment", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "vod_id"=>"int(11) NOT NULL",
            "user_id"=>"int(10) unsigned NOT NULL DEFAULT '1'",
            "header"=>"text",
            "comment"=>"text",
            "score"=>"smallint(5)",
            "created_at"=>"datetime NOT NULL DEFAULT '2011-12-01 00:00:00'",
            "rating"=>"smallint(6)",
            "active"=>"tinyint(1) DEFAULT '1'",
            "updated_at"=>"datetime NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_content_provider'
        $this->createTable("vod_content_provider", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name"=>"varchar(128) NOT NULL",
            "active"=>"tinyint(1) NOT NULL",
            "email"=>"varchar(128) NOT NULL",
            "default_library"=>"decimal(4,0) NOT NULL DEFAULT '3'",
            "default_current"=>"decimal(4,0) NOT NULL DEFAULT '4'",
            "svod_enabled"=>"tinyint(1) NOT NULL",
            "default_profit_sharing"=>"smallint(8) NOT NULL DEFAULT '50'",
            "created_at"=>"timestamp NOT NULL",
            "updated_at"=>"timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'",
            "billing_provider_id"=>"int(11) NOT NULL",
            "api_key"=>"varchar(8)",
            ), 
        $options);


        // Schema for table 'vod_content_provider_distributor'
        $this->createTable("vod_content_provider_distributor", 
            array(
            "provider_id"=>"int(11) NOT NULL",
            "distributor_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_content_provider_studio'
        $this->createTable("vod_content_provider_studio", 
            array(
            "provider_id"=>"int(11) NOT NULL",
            "studio_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_content_provider_user'
        $this->createTable("vod_content_provider_user", 
            array(
            "provider_id"=>"int(11) NOT NULL",
            "user_id"=>"int(10) unsigned NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_country'
        $this->createTable("vod_country", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "image_id"=>"int(11)",
            "name"=>"varchar(32) NOT NULL",
            "code"=>"char(2) NOT NULL",
            "updated_at"=>"timestamp NOT NULL",
            "created_at"=>"timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'",
            ), 
        $options);


        // Schema for table 'vod_country_group'
        $this->createTable("vod_country_group", 
            array(
            "vod_id"=>"int(11) NOT NULL",
            "country_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_credits'
        $this->createTable("vod_credits", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "person_id"=>"int(11) NOT NULL",
            "vod_id"=>"int(11) NOT NULL",
            "order"=>"smallint(5) NOT NULL",
            "cast_id"=>"smallint(5) NOT NULL",
            "job"=>"tinyint(4) NOT NULL",
            "character"=>"varchar(64) NOT NULL",
            "updated_at"=>"timestamp NOT NULL DEFAULT '2012-01-01 00:00:00'",
            "created_at"=>"timestamp NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_cron'
        $this->createTable("vod_cron", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name"=>"varchar(255) NOT NULL",
            "lapse"=>"int(11) NOT NULL",
            "last_occurance"=>"timestamp",
            ), 
        $options);


        // Schema for table 'vod_distributor'
        $this->createTable("vod_distributor", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name"=>"text",
            "apikey"=>"varchar(128)",
            "ip_address"=>"varchar(128)",
            "last_access"=>"datetime DEFAULT '2011-09-01 00:00:00'",
            "active"=>"tinyint(4) DEFAULT '1'",
            "last_sync"=>"datetime",
            "url"=>"varchar(128)",
            "sync_url"=>"varchar(128)",
            "resolve_url"=>"varchar(128)",
            "error_url"=>"varchar(128)",
            "profit_sharing"=>"decimal(2,2)",
            "profit_sharing_type"=>"tinyint(3)",
            "price_adjust"=>"double(2,2)",
            "statistics_ip_access"=>"varchar(128)",
            "language"=>"varchar(4)",
            "updated_at"=>"timestamp",
            "created_at"=>"timestamp",
            ), 
        $options);


        // Schema for table 'vod_distributor_banner'
        $this->createTable("vod_distributor_banner", 
            array(
            "distributor_id"=>"int(11) NOT NULL",
            "banner_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_distributor_featured'
        $this->createTable("vod_distributor_featured", 
            array(
            "distributor_id"=>"int(11) NOT NULL",
            "vod_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_distributor_group'
        $this->createTable("vod_distributor_group", 
            array(
            "vod_id"=>"int(11) NOT NULL",
            "distributor_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_distributor_log'
        $this->createTable("vod_distributor_log", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "distributor_id"=>"int(11) NOT NULL",
            "request"=>"text NOT NULL",
            "response"=>"text NOT NULL",
            "log_time"=>"timestamp NOT NULL",
            "status"=>"varchar(16) NOT NULL",
            "request_path"=>"varchar(192) NOT NULL",
            "ip_address"=>"varchar(16)",
            "session_id"=>"varchar(64)",
            "auth_id"=>"varchar(64)",
            ), 
        $options);


        // Schema for table 'vod_distributor_payment_method'
        $this->createTable("vod_distributor_payment_method", 
            array(
            "distributor_id"=>"int(11) NOT NULL",
            "payment_method_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_distributor_studio'
        $this->createTable("vod_distributor_studio", 
            array(
            "distributor_id"=>"int(11) NOT NULL",
            "studio_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_distributor_user'
        $this->createTable("vod_distributor_user", 
            array(
            "distributor_id"=>"int(11) NOT NULL",
            "user_id"=>"int(10) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_favourite'
        $this->createTable("vod_favourite", 
            array(
            "vod_id"=>"int(11) NOT NULL",
            "user_id"=>"int(10) unsigned NOT NULL"
            ), 
        $options);


        // Schema for table 'vod_featured'
        $this->createTable("vod_featured", 
            array(
            "vod_id"=>"int(11) NOT NULL",
            "genre_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_genre'
        $this->createTable("vod_genre", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name"=>"varchar(255) NOT NULL",
            "type"=>"smallint(2)",
            "updated_at"=>"timestamp",
            "created_at"=>"timestamp",
            "validfrom"=>"timestamp DEFAULT '2012-01-01 00:00:00'",
            "allowpurchase"=>"tinyint(4) NOT NULL",
            "limit"=>"smallint(6) NOT NULL",
            "selector"=>"varchar(255)",
            "order_by"=>"varchar(64)",
            "order_direction"=>"varchar(4) NOT NULL DEFAULT 'asc'",
            "deleted"=>"tinyint(1) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_genre_distributor'
        $this->createTable("vod_genre_distributor", 
            array(
            "genre_id"=>"int(11) NOT NULL",
            "distributor_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_genre_favourite'
        $this->createTable("vod_genre_favourite", 
            array(
            "genre_id"=>"int(11) NOT NULL",
            "user_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_genre_filter'
        $this->createTable("vod_genre_filter", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "genre_id"=>"int(11) NOT NULL",
            "operator"=>"varchar(6)",
            "andor"=>"varchar(3)",
            "order"=>"int(11) NOT NULL",
            "attribute"=>"varchar(128) NOT NULL",
            "value"=>"varchar(128) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_genre_group'
        $this->createTable("vod_genre_group", 
            array(
            "id"=>"int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY",
            "position"=>"smallint(6) NOT NULL",
            "vod_id"=>"int(11) NOT NULL",
            "genre_id"=>"int(11) NOT NULL",
            "active"=>"enum('0','1') NOT NULL DEFAULT '1'",
            ), 
        $options);


        // Schema for table 'vod_image_group'
        $this->createTable("vod_image_group", 
            array(
            "img_id"=>"int(11) NOT NULL",
            "item_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_language'
        $this->createTable("vod_language", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name"=>"varchar(50)",
            "native_name"=>"varchar(50)",
            "code"=>"char(2) NOT NULL",
            "updated_at"=>"timestamp NOT NULL",
            "created_at"=>"timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'",
            ), 
        $options);


        // Schema for table 'vod_language_group'
        $this->createTable("vod_language_group", 
            array(
            "vod_id"=>"int(11) NOT NULL",
            "language_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_lng'
        $this->createTable("vod_lng", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "image_id"=>"int(11)",
            ), 
        $options);


        // Schema for table 'vod_media'
        $this->createTable("vod_media", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "title"=>"text",
            "filesize"=>"bigint(20)",
            "filename"=>"text",
            "filepath"=>"text",
            "deleted"=>"tinyint(4)",
            "created_at"=>"datetime NOT NULL",
            "updated_at"=>"datetime NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_media_group'
        $this->createTable("vod_media_group", 
            array(
            "vod_id"=>"int(11) NOT NULL ",
            "media_id"=>"int(11) NOT NULL ",
            "type"=>"varchar(255)",
            ), 
        $options);


        // Schema for table 'vod_media_image'
        $this->createTable("vod_media_image", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "title"=>"varchar(96)",
            "filesize"=>"bigint(10)",
            "filename"=>"varchar(192)",
            "filepath"=>"varchar(255) DEFAULT '/images/'",
            "created_at"=>"datetime NOT NULL",
            "updated_at"=>"datetime NOT NULL",
            "image_type"=>"varchar(16)",
            "width"=>"smallint(6)",
            "height"=>"smallint(6)",
            "mimetype"=>"varchar(32)",
            "size"=>"varchar(24)",
            "vod_id"=>"int(11) NOT NULL",
            "is_primary"=>"tinyint(2) NOT NULL",
            "deleted"=>"tinyint(2)",
            ), 
        $options);


        // Schema for table 'vod_media_subtitle'
        $this->createTable("vod_media_subtitle", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "title"=>"text",
            "filesize"=>"bigint(20)",
            "filename"=>"text",
            "filepath"=>"text",
            "created_at"=>"datetime NOT NULL",
            "updated_at"=>"datetime NOT NULL",
            "language_id"=>"int(11)",
            "deleted"=>"tinyint(2) NOT NULL",
            "vod_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_media_video'
        $this->createTable("vod_media_video", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "title"=>"text",
            "filesize"=>"bigint(20)",
            "filename"=>"text",
            "filepath"=>"text",
            "created_at"=>"datetime NOT NULL",
            "updated_at"=>"datetime NOT NULL",
            "language_id"=>"int(11)",
            "type"=>"smallint(6)",
            "bitrate"=>"smallint(6)",
            "framerate"=>"varchar(6)",
            "video_container"=>"varchar(8)",
            "video_codec"=>"varchar(45)",
            "audio_codec"=>"varchar(45)",
            "audio_samplerate"=>"varchar(45)",
            "video_width"=>"int(11)",
            "video_height"=>"int(11)",
            "length"=>"varchar(16)",
            "profile"=>"char(1) DEFAULT '0'",
            "is_primary"=>"enum('0','1') DEFAULT '0'",
            "primary"=>"enum('0','1')",
            "deleted"=>"tinyint(1) NOT NULL",
            "vod_id"=>"int(11)",
            ), 
        $options);


        // Schema for table 'vod_package'
        $this->createTable("vod_package", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name"=>"varchar(128) NOT NULL",
            "title"=>"varchar(128) NOT NULL",
            "description"=>"text NOT NULL",
            "created_at"=>"datetime NOT NULL",
            "updated_at"=>"datetime NOT NULL",
            "released"=>"datetime",
            "is_deleted"=>"tinyint(4) NOT NULL",
            "price"=>"smallint(8) NOT NULL",
            "type"=>"smallint(2) NOT NULL",
            "price_class_id"=>"int(11) NOT NULL DEFAULT '1'",
            "active"=>"tinyint(4) NOT NULL DEFAULT '1'",
            "featured"=>"smallint(1) NOT NULL",
            "approved"=>"smallint(1) NOT NULL",
            "comment"=>"text NOT NULL",
            "img_id"=>"int(11)",
            "broken"=>"varchar(128)",
            "geo_restricted"=>"varchar(128)",
            ), 
        $options);


        // Schema for table 'vod_package_group'
        $this->createTable("vod_package_group", 
            array(
            "package_id"=>"int(11) NOT NULL",
            "vod_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_payment_emt'
        $this->createTable("vod_payment_emt", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "phoneNumber"=>"int(11) NOT NULL",
            "status"=>"varchar(32) NOT NULL",
            "timeout"=>"int(11) NOT NULL DEFAULT '60'",
            "authToken"=>"varchar(36) NOT NULL",
            "msisdn"=>"varchar(32)",
            "endDate"=>"varchar(32)",
            "created"=>"varchar(32) NOT NULL",
            "bill_id"=>"int(11)",
            "authorizationCode"=>"varchar(32)",
            "stan"=>"varchar(32)",
            "action"=>"varchar(32)",
            "amount"=>"int(11)",
            "created_at"=>"datetime NOT NULL DEFAULT '2015-01-01 00:00:00'",
            "updated_at"=>"datetime NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_pending_activation'
        $this->createTable("vod_pending_activation", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "activationKey"=>"smallint(16) NOT NULL",
            "userAgent"=>"varchar(255)",
            "deviceInfo"=>"text",
            "ipAddress"=>"varchar(32)",
            "expirationTime"=>"datetime NOT NULL",
            "user_id"=>"int(10) NOT NULL",
            "status"=>"tinyint(4) NOT NULL",
            "createdAt"=>"datetime NOT NULL DEFAULT '0000-00-00 00:00:00'",
            ), 
        $options);


        // Schema for table 'vod_person'
        $this->createTable("vod_person", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name"=>"varchar(128)",
            "image_url"=>"varchar(140)",
            "imdb_id"=>"varchar(12)",
            "tmdb_id"=>"varchar(12)",
            "profile_url"=>"varchar(140)",
            "updated_at"=>"timestamp",
            "created_at"=>"timestamp",
            ), 
        $options);


        // Schema for table 'vod_person_favourite'
        $this->createTable("vod_person_favourite", 
            array(
            "person_id"=>"int(11) NOT NULL ",
            "user_id"=>"int(10) NOT NULL ",
            ), 
        $options);


        // Schema for table 'vod_purchase'
        $this->createTable("vod_purchase", 
            array(
            "vod_id"=>"int(11) NOT NULL",
            "ticket_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_rating'
        $this->createTable("vod_rating", 
            array(
            "vod_id"=>"int(11) NOT NULL",
            "user_id"=>"int(10) unsigned NOT NULL",
            "rating"=>"smallint(2)",
            "created_at"=>"timestamp NOT NULL",
            "updated_at"=>"timestamp NOT NULL DEFAULT '2012-04-01 00:00:00'",
            ), 
        $options);


        // Schema for table 'vod_season'
        $this->createTable("vod_season", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "vod_id"=>"int(11) NOT NULL",
            "season_nr"=>"tinyint(4) NOT NULL",
            "name"=>"varchar(128) NOT NULL",
            "description"=>"text NOT NULL",
            "img_id"=>"int(11) NOT NULL",
            "price_class_id"=>"int(11) NOT NULL",
            "released"=>"timestamp NOT NULL",
            "active"=>"tinyint(1) NOT NULL",
            "approved"=>"tinyint(1) NOT NULL",
            "featured"=>"tinyint(1) NOT NULL",
            "comment"=>"varchar(255)",
            "created_at"=>"timestamp NOT NULL DEFAULT '2012-01-01 00:00:00'",
            "updated_at"=>"timestamp NOT NULL DEFAULT '2012-01-01 00:00:00'",
            ), 
        $options);


        // Schema for table 'vod_season_episode'
        $this->createTable("vod_season_episode", 
            array(
            "season_id"=>"int(11) NOT NULL",
            "vod_id"=>"int(11) NOT NULL",
            "sequence"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_seen'
        $this->createTable("vod_seen", 
            array(
            "vod_id"=>"int(11) NOT NULL",
            "user_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_status'
        $this->createTable("vod_status", 
            array(
            "id"=>"int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "movie_id"=>"int(11) NOT NULL",
            "user_id"=>"int(11) NOT NULL",
            "in_library"=>"tinyint(4) NOT NULL",
            "on_wishlist"=>"tinyint(4) NOT NULL",
            "rating"=>"tinyint(3) unsigned",
            "created_at"=>"timestamp",
            "updated_at"=>"timestamp NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_studio'
        $this->createTable("vod_studio", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name"=>"text",
            "image_id"=>"int(11)",
            "created_at"=>"timestamp NOT NULL",
            "updated_at"=>"timestamp NOT NULL DEFAULT '2012-04-01 00:00:00'",
            ), 
        $options);


        // Schema for table 'vod_studio_group'
        $this->createTable("vod_studio_group", 
            array(
            "vod_id"=>"int(11) NOT NULL",
            "studio_id"=>"int(11) NOT NULL ",
            ), 
        $options);


        // Schema for table 'vod_subscription'
        $this->createTable("vod_subscription", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "title"=>"varchar(128) NOT NULL",
            "description"=>"varchar(255)",
            "price_class_id"=>"int(11) NOT NULL",
            "notion"=>"varchar(128)",
            "created_at"=>"datetime NOT NULL",
            "updated_at"=>"timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'",
            ), 
        $options);


        // Schema for table 'vod_subtitle'
        $this->createTable("vod_subtitle", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "title"=>"text",
            "filesize"=>"bigint(20)",
            "filename"=>"text",
            "filepath"=>"text",
            "created_at"=>"datetime",
            "updated_at"=>"datetime",
            "deleted"=>"tinyint(4)",
            "language_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_subtitle_group'
        $this->createTable("vod_subtitle_group", 
            array(
            "vod_id"=>"int(11) NOT NULL",
            "subtitle_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_subtitles'
        $this->createTable("vod_subtitles", 
            array(
            "vod_id"=>"int(11) NOT NULL",
            "subtitle_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_tag'
        $this->createTable("vod_tag", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name"=>"varchar(128) NOT NULL",
            "frequency"=>"int(11) DEFAULT '1'",
            "updated_at"=>"timestamp",
            "created_at"=>"timestamp",
            ), 
        $options);


        // Schema for table 'vod_tags'
        $this->createTable("vod_tags", 
            array(
            "vod_id"=>"int(11) NOT NULL",
            "tag_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_temp'
        $this->createTable("vod_temp", 
            array(
            "id"=>"int(11) NOT NULL",
            "campaign_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_ticket'
        $this->createTable("vod_ticket", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "user_id"=>"int(10) unsigned NOT NULL",
            "bill_id"=>"int(11) NOT NULL",
            "auth_code"=>"varchar(32)",
            "validfrom"=>"datetime NOT NULL",
            "validto"=>"datetime NOT NULL",
            "active"=>"enum('0','1') NOT NULL DEFAULT '0'",
            "created_at"=>"timestamp NOT NULL",
            "updated_at"=>"timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'",
            ), 
        $options);


        // Schema for table 'vod_ticket_bill'
        $this->createTable("vod_ticket_bill", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "method_id"=>"int(11) NOT NULL",
            "order_id"=>"varchar(64) NOT NULL",
            "product_id"=>"int(11) NOT NULL",
            "date"=>"datetime NOT NULL",
            "status"=>"enum('0','1') NOT NULL DEFAULT '0'",
            "price_class_id"=>"int(11) NOT NULL",
            "distributor_id"=>"int(11) NOT NULL",
            "created_at"=>"timestamp NOT NULL",
            "price_amount"=>"decimal(4,2) NOT NULL",
            "description"=>"varchar(64)",
            "updated_at"=>"timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'",
            ), 
        $options);


        // Schema for table 'vod_ticket_payment_method'
        $this->createTable("vod_ticket_payment_method", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "provider_id"=>"int(11) NOT NULL",
            "active"=>"tinyint(2) NOT NULL",
            "name"=>"varchar(128)",
            "identifier"=>"varchar(32)",
            "testing"=>"smallint(2) NOT NULL",
            "transaction_fee"=>"double DEFAULT '0'",
            "transaction_type"=>"smallint(2)",
            ), 
        $options);


        // Schema for table 'vod_ticket_price_class'
        $this->createTable("vod_ticket_price_class", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name"=>"varchar(96) NOT NULL",
            "price"=>"decimal(18,2)",
            "amount"=>"smallint(10) NOT NULL DEFAULT '1'",
            "duration"=>"int(11)",
            "unit"=>"smallint(4) NOT NULL DEFAULT '1'",
            "type"=>"smallint(6) DEFAULT '1'",
            "lock_on_activation"=>"tinyint(2) NOT NULL",
            "instant_activation"=>"tinyint(2) NOT NULL",
            "created_at"=>"timestamp NOT NULL DEFAULT '2012-03-01 00:00:00'",
            "updated_at"=>"timestamp NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_ticket_price_group'
        $this->createTable("vod_ticket_price_group", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "price_class_id"=>"int(11) NOT NULL",
            "vod_group_id"=>"int(11) NOT NULL",
            "distributor_id"=>"int(11) NOT NULL",
            "provider_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_ticket_session'
        $this->createTable("vod_ticket_session", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "ticket_id"=>"int(11) NOT NULL",
            "session_id"=>"varchar(64) NOT NULL",
            "vod_id"=>"int(11)",
            "status"=>"tinyint(3) NOT NULL",
            "ip_address"=>"varchar(24)",
            "cookie_data"=>"varchar(255)",
            "created_at"=>"datetime NOT NULL",
            "updated_at"=>"datetime NOT NULL",
            "timestamp"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_title'
        $this->createTable("vod_title", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "md5"=>"varchar(32)",
            "title"=>"text",
            "original_name"=>"varchar(128)",
            "alternative_name"=>"varchar(128)",
            "base_name"=>"varchar(64)",
            "parent_id"=>"int(11)",
            "author_id"=>"int(11)",
            "provider_id"=>"int(11)",
            "featured"=>"tinyint(1) NOT NULL",
            "approved"=>"tinyint(1) NOT NULL",
            "geo_restricted"=>"tinyint(1) NOT NULL DEFAULT '1'",
            "broken"=>"tinyint(1)",
            "ean"=>"varchar(32)",
            "vet"=>"varchar(32)",
            "price"=>"decimal(4,2) DEFAULT '3.00'",
            "popularity"=>"decimal(2,0)",
            "active"=>"tinyint(1) NOT NULL",
            "year"=>"int(11)",
            "agelimit"=>"tinyint(4)",
            "comment"=>"varchar(255)",
            "imdb_id"=>"varchar(15)",
            "tmdb_id"=>"varchar(25)",
            "rt_id"=>"varchar(25)",
            "efi_id"=>"varchar(25)",
            "price_class_id"=>"int(11) NOT NULL DEFAULT '1'",
            "runtime"=>"smallint(6)",
            "overview"=>"text",
            "tagline"=>"varchar(150)",
            "released"=>"datetime",
            "expires_at"=>"datetime",
            "created_at"=>"datetime NOT NULL",
            "updated_at"=>"datetime NOT NULL",
            "views"=>"int(11)",
            "rating"=>"int(11)",
            "imdb_rating"=>"int(11)",
            "rt_critics_rating"=>"int(11)",
            "rt_audience_rating"=>"int(11)",
            "type"=>"enum('1','2','3') DEFAULT '1'",
            "episode_nr"=>"smallint(6)",
            "imdbrating"=>"varchar(4)",
            "deleted"=>"tinyint(1)",
            ), 
        $options);


        // Schema for table 'vod_title_genre_group'
        $this->createTable("vod_title_genre_group", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "genre_id"=>"int(11) NOT NULL",
            "position"=>"smallint(6) NOT NULL",
            "vod_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_title_priceclass'
        $this->createTable("vod_title_priceclass", 
            array(
            "vod_id"=>"int(11) NOT NULL",
            "price_class_id"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_tmdb_import_log'
        $this->createTable("vod_tmdb_import_log", 
            array(
            "id"=>"int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "import_name"=>"varchar(255) NOT NULL",
            "search_id"=>"int(11) NOT NULL",
            "movie_id"=>"int(11)",
            "created_at"=>"timestamp NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_tmdb_movie_attributes'
        $this->createTable("vod_tmdb_movie_attributes", 
            array(
            "id"=>"int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "code"=>"varchar(255) NOT NULL",
            "value"=>"text NOT NULL",
            "movie_id"=>"int(11) NOT NULL",
            "tmdb_id"=>"int(11) NOT NULL",
            "created_at"=>"timestamp",
            "updated_at"=>"timestamp NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_tmdb_search_log'
        $this->createTable("vod_tmdb_search_log", 
            array(
            "id"=>"int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "query"=>"varchar(255) NOT NULL",
            "log_content"=>"text NOT NULL",
            "created_at"=>"timestamp NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_transcoder_jobs'
        $this->createTable("vod_transcoder_jobs", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "weight"=>"int(11) NOT NULL",
            "preset"=>"varchar(32) NOT NULL",
            "source_file"=>"varchar(255) NOT NULL",
            "destination_file"=>"varchar(255) NOT NULL",
            "log_file"=>"varchar(255)",
            "status"=>"enum('pending','transcoding','failed','complete') NOT NULL",
            "user_id"=>"int(10)",
            "created_at"=>"timestamp NOT NULL",
            "updated_at"=>"timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'",
            ), 
        $options);


        // Schema for table 'vod_user'
        $this->createTable("vod_user", 
            array(
            "id"=>"int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "username"=>"varchar(96) NOT NULL",
            "password"=>"varchar(128) NOT NULL",
            "activationKey"=>"varchar(128) NOT NULL",
            "fb_access_token"=>"varchar(255)",
            "createtime"=>"timestamp NOT NULL",
            "lastvisit"=>"timestamp NOT NULL DEFAULT '2010-01-01 00:00:00'",
            "lastaction"=>"timestamp NOT NULL DEFAULT '2010-01-01 00:00:00'",
            "lastpasswordchange"=>"int(10) NOT NULL",
            "superuser"=>"int(1) NOT NULL",
            "status"=>"int(1) NOT NULL",
            "avatar"=>"varchar(255)",
            "expires_at"=>"datetime",
            "notifyType"=>"enum('None','Digest','Instant','Treshhold') DEFAULT 'Instant'",
            ), 
        $options);


        // Schema for table 'vod_user_access_token'
        $this->createTable("vod_user_access_token", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "user_id"=>"int(10) unsigned NOT NULL",
            "token"=>"varchar(64)",
            "ip_address"=>"varchar(50)",
            "user_agent"=>"varchar(255)",
            "expires_at"=>"datetime",
            "created_at"=>"datetime NOT NULL",
            "updated_at"=>"datetime NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_user_action'
        $this->createTable("vod_user_action", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "title"=>"varchar(32) NOT NULL",
            "comment"=>"text",
            "subject"=>"varchar(128)",
            "monitor"=>"tinyint(1)",
            "category"=>"varchar(16) DEFAULT 'info'",
            "alert"=>"tinyint(1)",
            "threshold_times"=>"smallint(24)",
            "threshold_hour"=>"smallint(24)",
            ), 
        $options);


        // Schema for table 'vod_user_activity'
        $this->createTable("vod_user_activity", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "timestamp"=>"timestamp NOT NULL",
            "user_id"=>"int(10) unsigned NOT NULL",
            "action"=>"varchar(32) NOT NULL",
            "message"=>"varchar(96) NOT NULL",
            "ip_address"=>"varchar(16) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_user_friendship'
        $this->createTable("vod_user_friendship", 
            array(
            "inviter_id"=>"int(11) NOT NULL",
            "friend_id"=>"int(11) NOT NULL",
            "status"=>"int(11) NOT NULL",
            "acknowledgetime"=>"int(11)",
            "requesttime"=>"int(11)",
            "updatetime"=>"int(11)",
            "message"=>"varchar(255) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_user_group'
        $this->createTable("vod_user_group", 
            array(
            "group_id"=>"int(11) NOT NULL ",
            "user_id"=>"int(11) NOT NULL ",
            ), 
        $options);


        // Schema for table 'vod_user_has_role'
        $this->createTable("vod_user_has_role", 
            array(
            "user_id"=>"int(10) unsigned NOT NULL ",
            "role_id"=>"int(10) unsigned NOT NULL ",

            ), 
        $options);


        // Schema for table 'vod_user_has_usergroup'
        $this->createTable("vod_user_has_usergroup", 
            array(
            "user_id"=>"int(10) unsigned NOT NULL",
            "group_id"=>"int(10) unsigned NOT NULL",
            "jointime"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_user_membership'
        $this->createTable("vod_user_membership", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "membership_id"=>"int(11) NOT NULL",
            "user_id"=>"int(11) NOT NULL",
            "payment_id"=>"int(11) NOT NULL",
            "order_date"=>"int(11) NOT NULL",
            "end_date"=>"int(11)",
            "payment_date"=>"int(11)",
            ), 
        $options);


        // Schema for table 'vod_user_messages'
        $this->createTable("vod_user_messages", 
            array(
            "id"=>"int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "timestamp"=>"int(10) unsigned NOT NULL",
            "from_user_id"=>"int(10) unsigned NOT NULL",
            "to_user_id"=>"int(10) unsigned NOT NULL",
            "title"=>"varchar(255) NOT NULL",
            "message"=>"text",
            "message_read"=>"tinyint(1) NOT NULL",
            "answered"=>"tinyint(1) NOT NULL",
            "draft"=>"tinyint(1)",
            ), 
        $options);


        // Schema for table 'vod_user_payment'
        $this->createTable("vod_user_payment", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "title"=>"varchar(255) NOT NULL",
            "text"=>"text",
            ), 
        $options);


        // Schema for table 'vod_user_permission'
        $this->createTable("vod_user_permission", 
            array(
            "principal_id"=>"int(11) NOT NULL",
            "subordinate_id"=>"int(11) NOT NULL",
            "type"=>"enum('user','role') NOT NULL",
            "action"=>"int(11) NOT NULL",
            "template"=>"tinyint(1) NOT NULL",
            "comment"=>"text",
            ), 
        $options);


        // Schema for table 'vod_user_privacysetting'
        $this->createTable("vod_user_privacysetting", 
            array(
            "user_id"=>"int(10) unsigned NOT NULL",
            "message_new_friendship"=>"tinyint(1) NOT NULL",
            "message_new_message"=>"tinyint(1) NOT NULL",
            "message_new_profilecomment"=>"tinyint(1) NOT NULL",
            "appear_in_search"=>"tinyint(1) NOT NULL DEFAULT '1'",
            "show_online_status"=>"tinyint(1) NOT NULL DEFAULT '1'",
            "log_profile_visits"=>"tinyint(1) NOT NULL DEFAULT '1'",
            "ignore_users"=>"varchar(255)",
            "public_profile_fields"=>"bigint(15) unsigned",
            ), 
        $options);


        // Schema for table 'vod_user_profile_comment'
        $this->createTable("vod_user_profile_comment", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "user_id"=>"int(11) NOT NULL",
            "profile_id"=>"int(11) NOT NULL",
            "comment"=>"text NOT NULL",
            "createtime"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_user_profile_fields'
        $this->createTable("vod_user_profile_fields", 
            array(
            "id"=>"int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "field_group_id"=>"int(10) unsigned NOT NULL DEFAULT '0'",
            "varname"=>"varchar(50) NOT NULL",
            "title"=>"varchar(255) NOT NULL",
            "hint"=>"text NOT NULL",
            "field_type"=>"varchar(50) NOT NULL",
            "field_size"=>"int(3) NOT NULL",
            "field_size_min"=>"int(3) NOT NULL",
            "required"=>"int(1) NOT NULL",
            "match"=>"varchar(255) NOT NULL",
            "range"=>"varchar(255) NOT NULL",
            "error_message"=>"varchar(255) NOT NULL",
            "other_validator"=>"varchar(255) NOT NULL",
            "default"=>"varchar(255) NOT NULL",
            "position"=>"int(3) NOT NULL",
            "visible"=>"int(1) NOT NULL",
            "related_field_name"=>"varchar(255)",
            ), 
        $options);


        // Schema for table 'vod_user_profile_fields_group'
        $this->createTable("vod_user_profile_fields_group", 
            array(
            "id"=>"int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "group_name"=>"varchar(50) NOT NULL",
            "title"=>"varchar(255) NOT NULL",
            "position"=>"int(3) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_user_profile_visit'
        $this->createTable("vod_user_profile_visit", 
            array(
            "visitor_id"=>"int(11) NOT NULL ",
            "visited_id"=>"int(11) NOT NULL ",
            "timestamp_first_visit"=>"int(11) NOT NULL",
            "timestamp_last_visit"=>"int(11) NOT NULL",
            "num_of_visits"=>"int(11) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_user_profiles'
        $this->createTable("vod_user_profiles", 
            array(
            "id"=>"int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "user_id"=>"int(10) unsigned NOT NULL",
            "timestamp"=>"timestamp NOT NULL",
            "privacy"=>"enum('protected','private','public') NOT NULL",
            "lastname"=>"varchar(50) NOT NULL",
            "firstname"=>"varchar(50) NOT NULL",
            "show_friends"=>"tinyint(1) DEFAULT '1'",
            "allow_comments"=>"tinyint(1) DEFAULT '1'",
            "email"=>"varchar(255) NOT NULL",
            "age"=>"smallint(4)",
            "city"=>"varchar(255)",
            "balance"=>"varchar(128) NOT NULL",
            "tickets"=>"varchar(254) NOT NULL",
            "purchase_history"=>"text NOT NULL",
            "favorites"=>"text NOT NULL",
            "messages"=>"int(11) NOT NULL",
            "sent_tickets"=>"text NOT NULL",
            "received_gifts"=>"text NOT NULL",
            "newsletter"=>"int(1)",
            "other_marketing"=>"int(11)",
            "ratings"=>"text",
            "subscription"=>"int(4) NOT NULL",
            "distributor_id"=>"int(11) NOT NULL DEFAULT '11'",
            "active_sessions"=>"text NOT NULL",
            "role"=>"varchar(64) NOT NULL",
            "profile_picture"=>"varchar(255) NOT NULL",
            "language"=>"varchar(2) NOT NULL",
            "subscriptions"=>"text NOT NULL",
            "active_subscriptions"=>"text NOT NULL",
            "mobile"=>"varchar(32)",
            ), 
        $options);


        // Schema for table 'vod_user_roles'
        $this->createTable("vod_user_roles", 
            array(
            "id"=>"int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "title"=>"varchar(255) NOT NULL",
            "description"=>"varchar(255)",
            "selectable"=>"tinyint(1) NOT NULL",
            "searchable"=>"tinyint(1) NOT NULL",
            "autoassign"=>"tinyint(1) NOT NULL",
            "is_membership_possible"=>"tinyint(1) NOT NULL",
            "price"=>"double",
            "duration"=>"int(11)",
            ), 
        $options);


        // Schema for table 'vod_user_session'
        $this->createTable("vod_user_session", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY",
            "user_id"=>"int(11) NOT NULL",
            "php_session_id"=>"varchar(64)",
            "started_on"=>"datetime",
            "updated_on"=>"datetime",
            "ip_address"=>"varchar(50)",
            "cookie_data"=>"varchar(255)",
            "created_at"=>"datetime NOT NULL",
            "updated_at"=>"datetime NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_user_settings'
        $this->createTable("vod_user_settings", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "title"=>"varchar(255) NOT NULL",
            "is_active"=>"tinyint(1) NOT NULL",
            "preserveProfiles"=>"tinyint(1) NOT NULL DEFAULT '1'",
            "enableAvatar"=>"tinyint(1) NOT NULL DEFAULT '1'",
            "registrationType"=>"tinyint(1) NOT NULL DEFAULT '4'",
            "enableRecovery"=>"tinyint(1) NOT NULL DEFAULT '1'",
            "enableProfileHistory"=>"tinyint(1) NOT NULL DEFAULT '1'",
            "messageSystem"=>"enum('None','Plain','Dialog') NOT NULL DEFAULT 'Dialog'",
            "notifyType"=>"enum('None','Digest','Instant','User','Treshhold') NOT NULL DEFAULT 'User'",
            "password_expiration_time"=>"int(11)",
            "readOnlyProfiles"=>"tinyint(1) NOT NULL",
            "loginType"=>"int(11) NOT NULL",
            "notifyemailchange"=>"enum('oldemail','newemail')",
            "enableCaptcha"=>"tinyint(1) NOT NULL DEFAULT '1'",
            "ldap_host"=>"varchar(255)",
            "ldap_port"=>"int(5)",
            "ldap_basedn"=>"varchar(255)",
            "ldap_protocol"=>"enum('2','3') NOT NULL DEFAULT '3'",
            "ldap_autocreate"=>"tinyint(1) NOT NULL DEFAULT '1'",
            "ldap_tls"=>"tinyint(1) NOT NULL",
            "ldap_transfer_attr"=>"tinyint(1) NOT NULL DEFAULT '1'",
            "ldap_transfer_pw"=>"tinyint(1) NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_user_subscription'
        $this->createTable("vod_user_subscription", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "subscription_id"=>"int(11) NOT NULL",
            "user_id"=>"int(10) NOT NULL",
            "bill_id"=>"int(11) NOT NULL",
            "valid_from"=>"timestamp NOT NULL",
            "valid_to"=>"timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'",
            ), 
        $options);


        // Schema for table 'vod_user_textsettings'
        $this->createTable("vod_user_textsettings", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "language"=>"enum('en','est','fi') NOT NULL DEFAULT 'en'",
            "text_registration_header"=>"text",
            "text_registration_footer"=>"text",
            "text_login_header"=>"text",
            "text_login_footer"=>"text",
            "text_email_registration"=>"text",
            "subject_email_registration"=>"text",
            "subject_email_recovery"=>"text",
            "text_email_recovery"=>"text",
            "text_email_activation"=>"text",
            "text_friendship_new"=>"text",
            "text_friendship_confirmed"=>"text",
            "text_profilecomment_new"=>"text",
            "text_message_new"=>"text",
            "text_membership_ordered"=>"text",
            "text_payment_arrived"=>"text",
            "subject_payment_arrived"=>"text",
            "text_membership_header"=>"text",
            "text_membership_footer"=>"text",
            "text_purchase_successful"=>"text",
            ), 
        $options);


        // Schema for table 'vod_usergroup'
        $this->createTable("vod_usergroup", 
            array(
            "id"=>"int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "owner_id"=>"int(11) NOT NULL",
            "title"=>"varchar(255) NOT NULL",
            "description"=>"text NOT NULL",
            ), 
        $options);


        // Schema for table 'vod_videos'
        $this->createTable("vod_videos", 
            array(
            "vod_id"=>"int(11) NOT NULL",
            "media_id"=>"int(11) NOT NULL",
            ), 
        $options);


       // Foreign Keys for table 'vod_content_provider'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_vod_content_provider_vod_billing_provider_billing_provider_id', 'vod_content_provider', 'billing_provider_id', 'vod_billing_provider', 'id', null, null); // FIX RELATIONS 
        endif;

        // Foreign Keys for table 'vod_content_provider_user'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_vod_content_provider_user_vod_content_provider_provider_id', 'vod_content_provider_user', 'provider_id', 'vod_content_provider', 'id', null, null); // FIX RELATIONS 
        endif;



        // Foreign Keys for table 'vod_distributor_banner'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_vod_distributor_banner_vod_banner_banner_id', 'vod_distributor_banner', 'banner_id', 'vod_banner', 'id', null, null); // FIX RELATIONS 
        endif;



        // Foreign Keys for table 'vod_distributor_featured'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_vod_distributor_featured_vod_distributor_distributor_id', 'vod_distributor_featured', 'distributor_id', 'vod_distributor', 'id', null, null); // FIX RELATIONS 
        endif;



        // Foreign Keys for table 'vod_distributor_payment_method'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_vod_distributor_payment_method_vod_distributor_distributor_id', 'vod_distributor_payment_method', 'distributor_id', 'vod_distributor', 'id', null, null); // FIX RELATIONS 
            $this->addForeignKey('fk_vod_distributor_payment_method_id', 'vod_distributor_payment_method', 'payment_method_id', 'vod_ticket_payment_method', 'id', null, null); // FIX RELATIONS 
        endif;



        // Foreign Keys for table 'vod_ticket'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_vod_ticket_vod_ticket_bill_bill_id', 'vod_ticket', 'bill_id', 'vod_ticket_bill', 'id', null, null); // FIX RELATIONS 
        endif;



        // Foreign Keys for table 'vod_user_access_token'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_vod_user_access_token_vod_user_user_id', 'vod_user_access_token', 'user_id', 'vod_user', 'id', null, null); // FIX RELATIONS 
        endif;

	}

	public function safeDown() {
		echo 'Migration down not supported.';
	}

}

?>
