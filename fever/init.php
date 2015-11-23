<?php

class Fever extends Plugin {
	private $host;

	function about() {
		return array(1.47,
			"Emulates the Fever API for Tiny Tiny RSS",
			"digitaldj & murphy");
	}

	function init($host) {
		$this->host = $host;
		$host->add_hook($host::HOOK_PREFS_TAB, $this);
	}

	function before($method) {
		return true;
	}

	function csrf_ignore($method) {
		return true;
	}

	function hook_prefs_tab($args) {
		if ($args != "prefPrefs") return;

		print "<div dojoType=\"dijit.layout.AccordionPane\" title=\"" . __("Fever Emulation") . "\">";

		print "<h3>" . __("Fever Emulation") . "</h3>";

		print "<p>" . __("Since the Fever API uses a different authentication mechanism to Tiny Tiny RSS, you must set a separate password to login. This password may be the same as your Tiny Tiny RSS password.") . "</p>";

		print "<p>" . __("Set a password to login with Fever:") . "</p>";

		print "<form dojoType=\"dijit.form.Form\">";

		print "<script type=\"dojo/method\" event=\"onSubmit\" args=\"evt\">
			evt.preventDefault();
			if (this.validate()) {
				new Ajax.Request('backend.php', {
					parameters: dojo.objectToQuery(this.getValues()),
					onComplete: function(transport) {
						notify_info(transport.responseText);
					}
				});
				//this.reset();
			}
			</script>";
		print "<input dojoType=\"dijit.form.TextBox\" style=\"display : none\" name=\"op\" value=\"pluginhandler\" />";
		print "<input dojoType=\"dijit.form.TextBox\" style=\"display : none\" name=\"method\" value=\"save\" />";
		print "<input dojoType=\"dijit.form.TextBox\" style=\"display : none\" name=\"plugin\" value=\"fever\" />";
		print "<input dojoType=\"dijit.form.ValidationTextBox\" required=\"1\" type=\"password\" name=\"password\" />";
		print "<button dojoType=\"dijit.form.Button\" type=\"submit\">" . __("Set Password") . "</button>";
		print "</form>";

		print "<p>" . __("To login with the Fever API, set your server details in your favourite RSS application to: ") . get_self_url_prefix() . "/plugins/fever/" . "</p>";
		print "<p>" . __("Additional details can be found at ") . "<a href=\"http://www.feedafever.com/api\" target=\"_blank\">http://www.feedafever.com/api</a></p>";

		print "<p>" . __("Note: Due to the limitations of the API and some RSS clients (for example, Reeder on iOS), some features are unavailable: \"Special\" Feeds (Published / Tags / Labels / Fresh / Recent), Nested Categories (hierarchy is flattened)") . "</p>";

		print "</div>";
	}

	function save()
	{
		if (isset($_POST["password"]) && isset($_SESSION["uid"]))
		{
			$result = db_query("SELECT login FROM ttrss_users WHERE id = '" . db_escape_string($_SESSION["uid"]) . "'");
			if ($line = db_fetch_assoc($result))
			{
				$password = md5($line["login"] . ":" . $_POST["password"]);
				$this->host->set($this, "password", $password);
				echo __("Password saved.");
			}
		}
	}

	function after() {

	}

	function api_version() {
		return 2;
	}
}

?>
