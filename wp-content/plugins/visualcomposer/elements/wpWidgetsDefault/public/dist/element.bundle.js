(window.vcvWebpackJsonp4x=window.vcvWebpackJsonp4x||[]).push([[0],{"./node_modules/raw-loader/index.js!./wpWidgetsDefault/editor.css":function(e,t){e.exports=".vce-widgets-container {\n  min-height: 1em;\n}\n"},"./node_modules/raw-loader/index.js!./wpWidgetsDefault/styles.css":function(e,t){e.exports='.vce-widgets-wrapper {\n  position: relative;\n  min-height: 30px;\n}\n\n.vce-widgets-wrapper[data-vcv-element]::after {\n  content: "";\n  position: absolute;\n  top: 0;\n  right: 0;\n  bottom: 0;\n  left: 0;\n  z-index: 999;\n}\n'},"./wpWidgetsDefault/index.js":function(e,t,s){"use strict";s.r(t);var o=s("./node_modules/vc-cake/index.js"),i=s("./node_modules/@babel/runtime/helpers/extends.js"),a=s.n(i),n=s("./node_modules/@babel/runtime/helpers/classCallCheck.js"),l=s.n(n),r=s("./node_modules/@babel/runtime/helpers/createClass.js"),d=s.n(r),c=s("./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js"),u=s.n(c),p=s("./node_modules/@babel/runtime/helpers/getPrototypeOf.js"),g=s.n(p),m=s("./node_modules/@babel/runtime/helpers/assertThisInitialized.js"),h=s.n(m),v=s("./node_modules/@babel/runtime/helpers/inherits.js"),b=s.n(v),w=s("./node_modules/@babel/runtime/helpers/defineProperty.js"),f=s.n(w),_=s("./node_modules/react/index.js"),y=s.n(_),C=function(e){function t(){var e,s;l()(this,t);for(var o=arguments.length,i=new Array(o),a=0;a<o;a++)i[a]=arguments[a];return s=u()(this,(e=g()(t)).call.apply(e,[this].concat(i))),f()(h()(s),"state",{shortcode:"",shortcodeContent:s.spinnerHTML()}),s}return b()(t,e),d()(t,[{key:"componentDidMount",value:function(){this.requestToServer()}},{key:"componentDidUpdate",value:function(e){(0,s("./node_modules/lodash/lodash.js").isEqual)(this.props.atts,e.atts)||this.requestToServer()}},{key:"requestToServer",value:function(){var e=this,t={before_title:this.props.atts.customWidgetHtml?this.props.atts.atts_before_title:"",after_title:this.props.atts.customWidgetHtml?this.props.atts.atts_after_title:"",before_widget:this.props.atts.customWidgetHtml?this.props.atts.atts_before_widget:"",after_widget:this.props.atts.customWidgetHtml?this.props.atts.atts_after_widget:""},s=Object(o.getService)("dataProcessor");this.setState({shortcodeContent:this.spinnerHTML()}),this.serverRequest=s.appServerRequest({"vcv-action":"elements:widget:adminNonce","vcv-nonce":window.vcvNonce,"vcv-widget-key":this.props.atts.widgetKey,"vcv-element-tag":this.props.atts.tag,"vcv-widget-value":this.props.atts.widget,"vcv-atts":t,"vcv-source-id":window.vcvSourceID}).then(function(t){if(e.serverRequest&&e.serverRequest.cancelled)e.serverRequest=null;else{var s=e.getResponse(t);s&&s.status?e.setState({shortcode:s.shortcode,shortcodeContent:s.shortcodeContent||""}):e.setState({shortcode:"Failed to render widget",shortcodeContent:""})}})}},{key:"render",value:function(){var e=this.props,t=e.id,s=e.atts,o=e.editor,i=s.customClass,n=s.metaCustomId,l=["vce-widgets-container"],r={};i&&l.push(i),n&&(r.id=n);var d=this.applyDO("all");return y.a.createElement("div",a()({className:l.join(" ")},r,o),y.a.createElement("div",a()({className:"vce vce-widgets-wrapper",id:"el-"+t},d),y.a.createElement("div",{className:"vcvhelper","data-vcvs-html":this.state.shortcode||"",dangerouslySetInnerHTML:{__html:this.state.shortcodeContent||""}})))}}]),t}(Object(o.getService)("api").elementComponent);(0,Object(o.getService)("cook").add)(s("./wpWidgetsDefault/settings.json"),function(e){e.add(C)},{css:s("./node_modules/raw-loader/index.js!./wpWidgetsDefault/styles.css"),editorCss:s("./node_modules/raw-loader/index.js!./wpWidgetsDefault/editor.css")})},"./wpWidgetsDefault/settings.json":function(e){e.exports={tag:{type:"string",access:"protected",value:"wpWidgetsDefault"},designOptions:{type:"designOptions",access:"public",value:{},options:{label:"Design Options"}},widgetKey:{type:"dropdown",access:"public",value:"",options:{label:"Widget",values:[],global:"vcvDefaultWidgets"}},customWidgetHtml:{type:"toggle",access:"public",value:!1,options:{label:"Enable custom widget HTML"}},atts_before_title:{type:"rawCode",access:"public",value:"",options:{label:"Before Title html",height:"20vh",mode:"html",onChange:{rules:{customWidgetHtml:{rule:"toggle"}},actions:[{action:"toggleVisibility"}]}}},atts_after_title:{type:"rawCode",access:"public",value:"",options:{label:"After Title html",height:"20vh",mode:"html",onChange:{rules:{customWidgetHtml:{rule:"toggle"}},actions:[{action:"toggleVisibility"}]}}},atts_before_widget:{type:"rawCode",access:"public",value:"",options:{label:"Before Widget html",height:"20vh",mode:"html",onChange:{rules:{customWidgetHtml:{rule:"toggle"}},actions:[{action:"toggleVisibility"}]}}},atts_after_widget:{type:"rawCode",access:"public",value:"",options:{label:"After Widget html",height:"20vh",mode:"html",onChange:{rules:{customWidgetHtml:{rule:"toggle"}},actions:[{action:"toggleVisibility"}]}}},widget:{type:"ajaxForm",access:"public",value:{key:"",value:""},options:{label:"",action:"vcv:wpWidgets:form",onChange:{rules:{widgetKey:{rule:"true"}},actions:[{action:"fieldMethod",options:{method:"requestToServer"}}]}}},editFormTab1:{type:"group",access:"protected",value:["widgetKey","widget","customWidgetHtml","atts_before_title","atts_after_title","atts_before_widget","atts_after_widget","metaCustomId","customClass"],options:{label:"General"}},metaEditFormTabs:{type:"group",access:"protected",value:["editFormTab1","designOptions"]},relatedTo:{type:"group",access:"protected",value:["General"]},customClass:{type:"string",access:"public",value:"",options:{label:"Extra class name",description:"Add an extra class name to the element and refer to it from Custom CSS option."}},metaCustomId:{type:"customId",access:"public",value:"",options:{label:"Element ID",description:"Apply unique Id to element to link directly to it by using #your_id (for element id use lowercase input only)."}}}}},[["./wpWidgetsDefault/index.js"]]]);