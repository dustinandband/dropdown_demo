$( document ).ready(function() {
	MaggicSuggestSettings();
});

function MaggicSuggestSettings()
{
	// player search
	g_instance = $('#playerSearch').magicSuggest({
		placeholder: 'player name or steam64D',
		useTabKey: true,
		toggleOnClick: true,
		//mode: 'remote',
		//typeDelay: 0,
		//sortOrder: 'name',
		//sortDir: 'asc',
		maxSelection: 4,
		maxEntryLength: 25,
		maxEntryRenderer: function(v) {
			return 'Must be below 25 characters';
		},
		data: "playerLists/SourceTV_Survival_Main.json",
		valueField: 'Steam64ID',
		renderer: function(data){
			return rendererComboItems(data);
		}
	});
	
	// logged event player search
	g_instanceLoggedEvent = $('#LogEventPlayerSearch').magicSuggest({
		placeholder: 'player name or steam64D',
		useTabKey: true,
		toggleOnClick: true,
		//mode: 'remote',
		//typeDelay: 0,
		//sortOrder: 'name',
		//sortDir: 'asc',
		maxSelection: 1, 
		maxEntryLength: 25,
		maxEntryRenderer: function(v) {
			return 'Must be below 25 characters';
		},
		data: "playerLists/SourceTV_Survival_LoggedEvents.json",
		valueField: 'Steam64ID',
		renderer: function(data){
			return rendererComboItems(data);
		}
	});
}

/*
	Formats player drop-down list.
	TODO: auto-detect div height and set img tag to that
*/
function rendererComboItems(data) {
return '<div style="padding: 5px; overflow:hidden;" id="OpeningDiv">'
	+ '<div style="float: left;"><img style="max-width: 40px; max-height: 46px;" src="'
	+ data.picture + '" /></div>'
	+  '<div style="float: left; margin-left: 5px">'
	+  '<div style="font-weight: bold; color: #333; font-size: 10px; line-height: 11px">'
	+  data.name + '</div>'
	+  '<div style="color: #999; font-size: 9px">' + data.Steam64ID + '</div>'
	+  '</div></div>' + '<div style="clear:both;"></div>';
}