<?php

final class playerListSync {
	
	private static $playerLists = "playerLists";
	private static $logFile = "LastUpdated.json";
	
	private static $json_playerMainURL = "https://raw.githubusercontent.com/dustinandband/players.json/main/PlayerList/SourceTV_Survival_Main.json";
	private static $json_playerLoggedEventsURL = "https://raw.githubusercontent.com/dustinandband/players.json/main/PlayerList/SourceTV_Survival_LoggedEvents.json";
	
	private static $json_playerMainFolder = "SourceTV_Survival_Main.json";
	private static $json_playerLoggedEventsFolder = "SourceTV_Survival_LoggedEvents.json";
	
	private static $timestamp = null;
	private static $NextUpdate = 240.0; // Minutes until we need to download again
	
	private static $json = null;
	private static $lastUpdated = null;
	private static $MinutesSinceLastUpdate = null;
	
	static function init()
	{
		if (!file_exists(self::$logFile) || !is_dir(self::$playerLists))
		{
			self::UpdateTimeStamp();
			self::RetrieveJSONFiles();
			return;
		}
		
		self::$json = json_decode(file_get_contents(self::$logFile), true);
		
		self::$lastUpdated = self::$json['LastUpdate'];
		self::$MinutesSinceLastUpdate = (time() - self::$lastUpdated)/60;
		
		if (self::$MinutesSinceLastUpdate > self::$NextUpdate)
		{
			self::UpdateTimeStamp();
			self::RetrieveJSONFiles();
		}
	}
	
	private static function UpdateTimeStamp()
	{
		self::$timestamp = array(
		"LastUpdate" => time()
		);

		$fp = fopen(self::$logFile, 'w');
		fwrite($fp, json_encode(self::$timestamp));
		fclose($fp);
	}

	private static function RetrieveJSONFiles()
	{
		// create dir if it doesn't exist
		if (!is_dir(self::$playerLists))
		{
			mkdir(self::$playerLists);
		}

		// download the files
		if ($JSONfile = file_get_contents(self::$json_playerMainURL))
		{
			$fp = fopen(self::$playerLists . "/" . self::$json_playerMainFolder, 'w');
			fwrite($fp, $JSONfile);
			fclose($fp);
		}

		if ($JSONfile = file_get_contents(self::$json_playerLoggedEventsURL))
		{
			$fp = fopen(self::$playerLists . "/" . self::$json_playerLoggedEventsFolder, 'w');
			fwrite($fp, $JSONfile);
			fclose($fp);
		}
	}
}

playerListSync::init();