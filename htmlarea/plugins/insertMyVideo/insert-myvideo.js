insertMyVideo = HTMLArea.Plugin.extend({
	constructor : function(editor, pluginName) {
		this.base(editor, pluginName);
	},
	/*
	 * This function gets called by the class constructor
	 */
	configurePlugin : function(editor) {
		this.pageTSConfiguration = this.editorConfiguration.buttons.myvideo;
		/*
		 * Registering plugin "About" information
		 */
		
		var pluginInformation = {
			version		: '0.1',
			developer		: 'Mauro Parente',
			developerUrl	: 'http://www.innovationconsulting.it/',
			copyrightOwner	: '',
			license		: 'GPL'
		};
		this.registerPluginInformation(pluginInformation);
		/*
		 * Registering the button
		 */
		var buttonConfiguration = {
			id			: 'insertMyVideo',
			tooltip		: 'Insert Video',
			iconCls		: 'insertMyVideo',
			action		: 'onButtonPress',
			hotKey		: (this.pageTSConfiguration ? this.pageTSConfiguration.hotKey : null),
			dialog		: true
		};
		this.registerButton(buttonConfiguration);
		return true;
	},
	/*
	 * This function gets called when the button was pressed.
	 *
	 * @param	object		editor: the editor instance
	 * @param	string		id: the button id or the key
	 *
	 * @return	boolean		false if action is completed
	 */
	onButtonPress: function (editor, id, target) {
		
		var buttonId = this.translateHotKey(id);
		buttonId = buttonId ? buttonId : id;
		var video, outparam = null;
		this.editor.focusEditor();
		
		if (typeof(target) !== "undefined") {
			video = target;
		} else {
			video = this.editor.getParentElement();
		}
		if (video && !/^img$/i.test(video.nodeName)) {
			video = null;
		}
		
		/*
		if (video && video.getAttribute("type") != "" && video.getAttribute("type") != undefined) {
			outparam = {
				f_url : video.getAttribute("ref"),
				f_thumb : video.getAttribute("src"),
				f_width : video.getAttribute("width"),
				f_height : video.getAttribute("height"),
				f_type : video.getAttribute("type")
			};
		}
		*/
		this.video = video;
		this.dialog = this.openDialog("insertMyVideo", this.makeUrlFromPopupName("insert_myvideo"), "insertVideo", outparam, {width:600, height:650});
		return false;
	},
	
	insertVideo : function (param) {
		if (typeof(param) != "undefined" && typeof(param.f_ref) != "undefined") {
			this.editor.focusEditor();
			var video = this.video;
			if(param.f_type == 'jwplayer') {
					param.f_thumb = this.editor.config.pathToPluginDirectory['insertMyVideo'] + param.f_thumb;
			}
			if(!video) {
				this.editor.insertHTML('<img src="' + param.f_thumb + '" type="' + param.f_type + '" ref="' + param.f_ref + '" width="' + param.f_width + '" height="' + param.f_height + '" />');
			} else {
				video.src = param.f_thumb;
				video.type = param.f_type;
				video.width = param.f_width;
				video.height = param.f_height;
				video.ref = param.f_ref
			}
			
			this.dialog.close();
		}
		return false;
	}
	
});