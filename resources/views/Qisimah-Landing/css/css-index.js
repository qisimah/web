import React, {StyleSheet, Dimensions, PixelRatio} from "react-native";
const {width, height, scale} = Dimensions.get("window"),
    vw = width / 100,
    vh = height / 100,
    vmin = Math.min(vw, vh),
    vmax = Math.max(vw, vh);

export default StyleSheet.create({
    "html": {
        "width": "100%",
        "overflowX": "hidden"
    },
    "body": {
        "width": "100%",
        "overflowX": "hidden",
        "height": "100%",
        "fontFamily": "Lato\", \"Serif",
        "fontWeight": "300",
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "fontSize": 19,
        "lineHeight": 28,
        "color": "#777",
        "background": "#fff",
        "position": "relative"
    },
    "h1": {
        "fontSize": 3,
        "lineHeight": 1.2,
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0.3,
        "marginLeft": 0
    },
    "h2": {
        "fontSize": 1.8,
        "lineHeight": 1.4,
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0.3,
        "marginLeft": 0
    },
    "h3": {
        "fontSize": 1.4,
        "lineHeight": 1.4
    },
    "h4": {
        "fontSize": 1.25,
        "lineHeight": 1.4
    },
    "h5": {
        "fontSize": 1.1,
        "lineHeight": 1.4
    },
    "h6": {
        "fontSize": 1,
        "lineHeight": 1.2
    },
    "h1 a": {
        "textDecoration": "none"
    },
    "h2 a": {
        "textDecoration": "none"
    },
    "h3 a": {
        "textDecoration": "none"
    },
    "h4 a": {
        "textDecoration": "none"
    },
    "h5 a": {
        "textDecoration": "none"
    },
    "h6 a": {
        "textDecoration": "none"
    },
    "p": {
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 1,
        "paddingLeft": 0,
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0
    },
    "a": {
        "color": "#3eb0f7",
        "outline": 0,
        "fontWeight": "bold",
        "WebkitTransition": "all .8s ease",
        "transition": "all .8s ease"
    },
    "a:hover": {
        "textDecoration": "none",
        "color": "#1f2222",
        "WebkitTransition": "all .8s ease",
        "transition": "all .8s ease"
    },
    "highlight": {
        "color": "#3eb0f7"
    },
    "preloader": {
        "position": "fixed",
        "left": 0,
        "top": 0,
        "zIndex": 999,
        "width": "100%",
        "height": "100%",
        "overflow": "visible",
        "background": "#fff url('../images/landing/loading.gif') no-repeat center center"
    },
    "fullscreen": {
        "width": "100%",
        "minHeight": "100%",
        "backgroundRepeat": "no-repeat",
        "backgroundPosition": "50% 50%\\9 !important"
    },
    "overlay": {
        "backgroundColor": "rgba(0, 0, 0, 0.5)",
        "position": "relative",
        "width": "100%",
        "height": "100%",
        "display": "block"
    },
    "musician": {
        "width": "100%",
        "minHeight": "100%",
        "backgroundRepeat": "no-repeat",
        "backgroundPosition": "50% 50%\\9 !important"
    },
    "advertiser": {
        "width": "100%",
        "minHeight": "100%",
        "backgroundRepeat": "no-repeat",
        "backgroundPosition": "50% 50%\\9 !important"
    },
    "menu": {
        "zIndex": 99
    },
    "navbar-default": {
        "background": "rgba(255, 255, 255, 0.95)",
        "boxShadow": "0px 0.5px 2px #cecece"
    },
    "navbar-default navbar-brand": {
        "paddingTop": 7,
        "paddingRight": 7,
        "paddingBottom": 7,
        "paddingLeft": 7
    },
    "navbar-default navbar-nav > li > a": {
        "color": "#777",
        "fontWeight": "500"
    },
    "navbar-default navbar-nav > li > a:hover": {
        "color": "#3eb0f7"
    },
    "navbar-default navbar-nav > li > a:focus": {
        "color": "#3eb0f7"
    },
    "navbar-default navbar-nav > active > a": {
        "background": "transparent",
        "color": "#3eb0f7"
    },
    "navbar-default navbar-nav > active > a:hover": {
        "background": "transparent",
        "color": "#3eb0f7"
    },
    "navbar-default navbar-nav > active > a:focus": {
        "background": "transparent",
        "color": "#3eb0f7"
    },
    "btn-default": {
        "fontSize": 17,
        "marginTop": 30,
        "marginRight": 10,
        "marginBottom": 10,
        "marginLeft": 0,
        "lineHeight": 20,
        "paddingTop": 15,
        "paddingRight": 35,
        "paddingBottom": 15,
        "paddingLeft": 35,
        "height": 50,
        "border": "2px solid #3eb0f7",
        "background": "transparent",
        "transition": "all 0.4s",
        "color": "#3eb0f7",
        "borderRadius": 100
    },
    "btn-default:hover": {
        "border": "2px solid #3eb0f7",
        "background": "#3eb0f7",
        "color": "white"
    },
    "btn-default:focus": {
        "border": "2px solid #3eb0f7",
        "background": "#3eb0f7",
        "color": "white"
    },
    "btn-default:active": {
        "border": "2px solid #3eb0f7",
        "background": "#3eb0f7",
        "color": "white"
    },
    "btn-defaultactive": {
        "border": "2px solid #3eb0f7",
        "background": "#3eb0f7",
        "color": "white"
    },
    "open > dropdown-togglebtn-default": {
        "border": "2px solid #3eb0f7",
        "background": "#3eb0f7",
        "color": "white"
    },
    "btn-primary": {
        "fontSize": 17,
        "marginTop": 30,
        "marginRight": 10,
        "marginBottom": 10,
        "marginLeft": 0,
        "lineHeight": 20,
        "paddingTop": 15,
        "paddingRight": 35,
        "paddingBottom": 15,
        "paddingLeft": 35,
        "height": 50,
        "border": "2px solid #3eb0f7",
        "background": "#3eb0f7",
        "transition": "all 0.4s",
        "color": "white",
        "borderRadius": 100
    },
    "btn-primary:hover": {
        "border": "2px solid #3eb0f7",
        "background": "transparent",
        "color": "#3eb0f7"
    },
    "btn-primary:focus": {
        "border": "2px solid #3eb0f7",
        "background": "transparent",
        "color": "#3eb0f7"
    },
    "btn-primary:active": {
        "border": "2px solid #3eb0f7",
        "background": "transparent",
        "color": "#3eb0f7"
    },
    "btn-primaryactive": {
        "border": "2px solid #3eb0f7",
        "background": "transparent",
        "color": "#3eb0f7"
    },
    "open > dropdown-togglebtn-primary": {
        "border": "2px solid #3eb0f7",
        "background": "transparent",
        "color": "#3eb0f7"
    },
    "btn-secondary": {
        "fontSize": 20,
        "fontWeight": "300",
        "lineHeight": 20,
        "paddingTop": 20,
        "paddingRight": 50,
        "paddingBottom": 20,
        "paddingLeft": 50,
        "height": 65,
        "border": "none",
        "background": "#3eb0f7",
        "transition": "all 0.4s",
        "color": "white",
        "borderRadius": 4
    },
    "btn-secondary:hover": {
        "background": "#1f96e0",
        "color": "white"
    },
    "btn-secondary:focus": {
        "background": "#1f96e0",
        "color": "white"
    },
    "btn-secondary:active": {
        "background": "#1f96e0",
        "color": "white"
    },
    "btn-secondaryactive": {
        "background": "#1f96e0",
        "color": "white"
    },
    "open > dropdown-togglebtn-secondary": {
        "background": "#1f96e0",
        "color": "white"
    },
    "site-name img": {
        "width": 120
    },
    "logo": {
        "marginTop": 100,
        "marginRight": 0,
        "marginBottom": 40,
        "marginLeft": 0
    },
    "logo img": {
        "width": 250
    },
    "landing h1": {
        "fontSize": 56,
        "fontWeight": "300",
        "color": "#fff",
        "marginTop": 30,
        "marginRight": 0,
        "marginBottom": 30,
        "marginLeft": 0,
        "textShadow": "0 1px 2px rgba(0, 0, 0, .6)"
    },
    "landing p": {
        "color": "#fff"
    },
    "landing h2": {
        "color": "#fff"
    },
    "landing-text": {
        "marginBottom": 20
    },
    "landing-text p": {
        "fontSize": "17px !important"
    },
    "head-btn": {
        "marginBottom": 150
    },
    "option": {
        "textTransform": "uppercase",
        "paddingTop": 5,
        "paddingRight": 5,
        "paddingBottom": 5,
        "paddingLeft": 5,
        "minWidth": 80,
        "marginRight": 5,
        "transition": "all 0.4s",
        "fontSize": 14,
        "color": "#fff"
    },
    "signup-header": {
        "marginTop": 150,
        "marginRight": 0,
        "marginBottom": 100,
        "marginLeft": 0,
        "background": "rgba(255,255,255,0.2)",
        "borderRadius": 4,
        "paddingLeft": 20,
        "paddingRight": 20
    },
    "signup-header h3": {
        "paddingTop": 20,
        "paddingRight": 0,
        "paddingBottom": 10,
        "paddingLeft": 0,
        "color": "white",
        "fontWeight": "300"
    },
    "form-header input": {
        "position": "relative",
        "paddingTop": 5,
        "paddingRight": 15,
        "paddingBottom": 5,
        "paddingLeft": 15
    },
    "form-header form-control": {
        "borderRadius": 0,
        "border": "solid 1px #dadada",
        "backgroundColor": "#fff",
        "color": "#333",
        "height": 55
    },
    "form-header btn": {
        "borderRadius": 0,
        "height": 55,
        "width": "100%",
        "backgroundColor": "#3eb0f7",
        "color": "white",
        "fontSize": "17px !important",
        "paddingTop": 0,
        "paddingRight": 33,
        "paddingBottom": 0,
        "paddingLeft": 33,
        "border": "none",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "WebkitTransition": "all .8s ease",
        "transition": "all .8s ease"
    },
    "form-header btn:hover": {
        "backgroundColor": "#1f96e0",
        "WebkitTransition": "all .8s ease",
        "transition": "all .8s ease"
    },
    "privacy": {
        "paddingTop": 0,
        "fontSize": 13
    },
    "signup-header p": {
        "color": "white"
    },
    "privacy a": {
        "textDecoration": "underline",
        "color": "white",
        "fontWeight": "300"
    },
    "policy": {
        "paddingTop": 100,
        "paddingRight": 0,
        "paddingBottom": 70,
        "paddingLeft": 0
    },
    "intro": {
        "paddingTop": 100,
        "paddingRight": 0,
        "paddingBottom": 70,
        "paddingLeft": 0
    },
    "intro h2": {
        "fontSize": 40,
        "fontWeight": "300",
        "marginTop": 15,
        "marginRight": 0,
        "marginBottom": 15,
        "marginLeft": 0
    },
    "intro-pic": {
        "marginTop": 20
    },
    "btn-section": {
        "paddingTop": 20
    },
    "feature": {
        "paddingTop": 100,
        "background": "#f6f6f6"
    },
    "feature h2": {
        "marginTop": 15,
        "marginRight": 0,
        "marginBottom": 15,
        "marginLeft": 0,
        "fontSize": 40,
        "fontWeight": "300"
    },
    "feature feature-title p": {
        "fontSize": 18
    },
    "row-feat": {
        "paddingTop": 50
    },
    "feat-list": {
        "marginTop": 40
    },
    "feat-list i": {
        "fontSize": 48,
        "float": "left",
        "width": "20%",
        "color": "#555",
        "height": "100%",
        "position": "relative",
        "opacity": 0.6,
        "WebkitTransition": "all .8s ease",
        "transition": "all .8s ease"
    },
    "feat-list:hover i": {
        "color": "#3eb0f7",
        "WebkitTransition": "all .8s ease",
        "transition": "all .8s ease"
    },
    "feature inner": {
        "float": "left",
        "display": "inline-block",
        "width": "80%",
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 50,
        "paddingLeft": 0
    },
    "feature-2": {
        "paddingTop": 100,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0
    },
    "feature-2 h2": {
        "fontSize": 40,
        "fontWeight": "300",
        "marginTop": 15,
        "marginRight": 0,
        "marginBottom": 15,
        "marginLeft": 0
    },
    "feature-2-pic": {
        "marginTop": 20
    },
    "subscribe": {
        "color": "#fff"
    },
    "subscribe p": {
        "marginTop": 30,
        "marginRight": "auto",
        "marginBottom": 30,
        "marginLeft": "auto"
    },
    "subscribe-form": {
        "maxWidth": 400,
        "marginTop": 50,
        "marginRight": "auto",
        "marginBottom": 150,
        "marginLeft": "auto",
        "textAlign": "center",
        "overflow": "hidden"
    },
    "subscribe-form form": {
        "position": "relative"
    },
    "subscribe-form input": {
        "maxWidth": "85%",
        "position": "relative",
        "paddingTop": 5,
        "paddingRight": 25,
        "paddingBottom": 5,
        "paddingLeft": 25
    },
    "subscribe-form form-control": {
        "borderRadius": "4px 0 0 4px",
        "border": "none",
        "backgroundColor": "rgba(255, 255, 255, 0.6)",
        "color": "#333",
        "fontSize": 1.2,
        "height": 55
    },
    "subscribe-form button": {
        "borderRadius": "0 4px 4px 0",
        "backgroundColor": "#3eb0f7",
        "color": "#ffffff",
        "fontSize": 1,
        "lineHeight": 52,
        "position": "absolute",
        "top": 0,
        "right": 0,
        "paddingTop": 0,
        "paddingRight": 30,
        "paddingBottom": 0,
        "paddingLeft": 30,
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "WebkitTransition": "all .8s ease",
        "transition": "all .8s ease"
    },
    "subscribe-form btn": {
        "height": 55
    },
    "subscribe-form btn:hover": {
        "backgroundColor": "#1f96e0",
        "color": "#fff",
        "WebkitTransition": "all .8s ease",
        "transition": "all .8s ease"
    },
    "subscribe-form form-control::-webkit-input-placeholder": {
        "color": "#333"
    },
    "subscribe-form form-control:-moz-placeholder": {
        "color": "#333"
    },
    "subscribe-form form-control::-moz-placeholder": {
        "color": "#333"
    },
    "subscribe-form form-control:-ms-input-placeholder": {
        "color": "#333"
    },
    "package": {
        "paddingTop": 100
    },
    "title-line": {
        "width": 100,
        "height": 3,
        "marginTop": 0,
        "marginRight": "auto",
        "marginBottom": 0,
        "marginLeft": "auto",
        "background": "#3eb0f7"
    },
    "price-box": {
        "border": "solid 1px #d1d1d1"
    },
    "package-option": {
        "paddingTop": 50,
        "paddingRight": 0,
        "paddingBottom": 100,
        "paddingLeft": 0
    },
    "package-option ul": {
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0
    },
    "price-heading h3": {
        "marginTop": 0
    },
    "price-heading i": {
        "color": "#d1d1d1",
        "fontSize": 75,
        "marginTop": 20
    },
    "price-group": {
        "paddingTop": 30,
        "paddingRight": 0,
        "paddingBottom": 10,
        "paddingLeft": 0
    },
    "price-group dollar": {
        "fontSize": 20,
        "position": "relative",
        "bottom": 48
    },
    "price-group price": {
        "color": "#3eb0f7",
        "fontSize": 90,
        "fontWeight": "500"
    },
    "price-group time": {
        "fontSize": 18
    },
    "price-feature li": {
        "marginLeft": 30,
        "marginRight": 30,
        "listStyle": "none",
        "borderBottom": "solid 1px #d1d1d1",
        "lineHeight": 40
    },
    "btn-price": {
        "marginTop": 5,
        "marginRight": 0,
        "marginBottom": 15,
        "marginLeft": 0,
        "fontSize": 17,
        "paddingTop": 7,
        "paddingRight": 35,
        "paddingBottom": 7,
        "paddingLeft": 35,
        "height": 40,
        "background": "#3eb0f7",
        "transition": "all 0.4s",
        "color": "white",
        "borderRadius": 4
    },
    "btn-price:hover": {
        "background": "#1f96e0",
        "color": "white"
    },
    "client": {
        "background": "#f6f6f6",
        "paddingTop": 70,
        "paddingRight": 0,
        "paddingBottom": 70,
        "paddingLeft": 0
    },
    "client img": {
        "maxHeight": 80,
        "marginTop": 0,
        "marginRight": 20,
        "marginBottom": 0,
        "marginLeft": 20,
        "opacity": 1,
        "transition": "all 0.3s ease",
        "WebkitTransition": "all 0.3s ease",
        "MozTransition": "all 0.3s ease"
    },
    "client img:hover": {
        "opacity": 0.7,
        "transition": "all 0.3s ease",
        "WebkitTransition": "all 0.3s ease",
        "MozTransition": "all 0.3s ease"
    },
    "testi": {
        "paddingTop": 100,
        "paddingRight": 0,
        "paddingBottom": 100,
        "paddingLeft": 0
    },
    "testi-item": {
        "display": "block",
        "width": "100%",
        "height": "auto",
        "position": "relative",
        "marginTop": 30
    },
    "testi-item box": {
        "marginRight": 15,
        "marginLeft": 15
    },
    "testi-item box message": {
        "paddingTop": 20,
        "paddingRight": 20,
        "paddingBottom": 20,
        "paddingLeft": 20,
        "fontStyle": "italic",
        "lineHeight": 30,
        "fontWeight": "300",
        "fontSize": 20
    },
    "testi-item client-pic img": {
        "width": 70,
        "height": 70,
        "borderRadius": "50%",
        "maxWidth": "100%"
    },
    "testi-item client-info client-name": {
        "marginTop": 10,
        "fontSize": 16
    },
    "testi-item client-info company": {
        "fontStyle": "italic",
        "color": "#3eb0f7"
    },
    "owl-theme owl-controls owl-page span": {
        "background": "#3eb0f7"
    },
    "video-header": {
        "marginTop": 40,
        "marginRight": 0,
        "marginBottom": 30,
        "marginLeft": 0
    },
    "video-embed": {
        "position": "relative",
        "paddingTop": "56.25%",
        "height": 0,
        "backgroundColor": "#000000",
        "WebkitBoxShadow": "0 5px 15px rgba(0,0,0,0.2)",
        "boxShadow": "0 5px 15px rgba(0,0,0,0.2)"
    },
    "video-embed iframe": {
        "position": "absolute",
        "top": 0,
        "left": 0,
        "width": "100%",
        "height": "100%"
    },
    "action": {
        "color": "#fff"
    },
    "action h2": {
        "marginTop": 100,
        "fontSize": 40,
        "fontWeight": "300"
    },
    "download-cta": {
        "paddingTop": 50,
        "paddingRight": 0,
        "paddingBottom": 160,
        "paddingLeft": 0
    },
    "contact": {
        "width": "100%",
        "minHeight": "100%"
    },
    "contact  h2": {
        "color": "white"
    },
    "ul-address a": {
        "fontWeight": "normal"
    },
    "ul-address a:hover": {
        "color": "white"
    },
    "ul-address li": {
        "paddingRight": 20,
        "marginBottom": 8,
        "listStyle": "none",
        "color": "white"
    },
    "ul-address i": {
        "marginLeft": 15,
        "position": "absolute",
        "left": 0,
        "color": "#3eb0f7",
        "fontSize": 25,
        "lineHeight": 30
    },
    "contact-row": {
        "marginTop": 100,
        "marginRight": 0,
        "marginBottom": 100,
        "marginLeft": 0
    },
    "contact-form": {
        "marginTop": 0,
        "marginRight": "auto",
        "marginBottom": 0,
        "marginLeft": "auto"
    },
    "contact-form input": {
        "position": "relative",
        "paddingTop": 5,
        "paddingRight": 25,
        "paddingBottom": 5,
        "paddingLeft": 25,
        "width": "100%"
    },
    "contact-form textarea": {
        "position": "relative",
        "paddingTop": 10,
        "paddingRight": 25,
        "paddingBottom": 10,
        "paddingLeft": 25,
        "width": "100%",
        "height": "120px !important"
    },
    "contact-form form-control": {
        "borderRadius": 0,
        "border": "solid 1px #dadada",
        "backgroundColor": "#fff",
        "color": "#333",
        "fontSize": 1.2,
        "height": 55
    },
    "contact-form btn": {
        "height": 55,
        "width": "100%",
        "backgroundColor": "#3eb0f7",
        "color": "#ffffff",
        "fontSize": "17px !important",
        "lineHeight": 18,
        "paddingTop": 0,
        "paddingRight": 33,
        "paddingBottom": 0,
        "paddingLeft": 33,
        "border": "none",
        "borderRadius": 0,
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "WebkitTransition": "all .8s ease",
        "transition": "all .8s ease"
    },
    "contact-form btn:hover": {
        "backgroundColor": "#1f96e0",
        "WebkitTransition": "all .8s ease",
        "transition": "all .8s ease"
    },
    "footer": {
        "background": "#fff",
        "paddingTop": 50,
        "paddingRight": 0,
        "paddingBottom": 50,
        "paddingLeft": 0
    },
    "social ul": {
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "listStyle": "none"
    },
    "social li": {
        "display": "inline-block",
        "paddingRight": 0.3,
        "paddingBottom": 0.3
    },
    "social li a": {
        "display": "block",
        "width": 40,
        "height": 40,
        "lineHeight": 40,
        "color": "#3eb0f7",
        "borderRadius": "50%",
        "background": "#fff",
        "border": "solid 1px #3eb0f7",
        "WebkitTransition": "all .8s ease",
        "transition": "all .8s ease"
    },
    "social li a:hover": {
        "color": "#fff",
        "background": "#3eb0f7"
    },
    "shortcode-basic": {
        "paddingTop": 70,
        "paddingRight": 0,
        "paddingBottom": 10,
        "paddingLeft": 0
    },
    "shortcode-button": {
        "paddingTop": 50,
        "paddingRight": 0,
        "paddingBottom": 10,
        "paddingLeft": 0,
        "width": "100%",
        "minHeight": "100%"
    },
    "shortcode-button form-horizontal": {
        "paddingLeft": 20,
        "paddingRight": 20
    },
    "shortcode-icon": {
        "paddingTop": 70,
        "paddingRight": 0,
        "paddingBottom": 10,
        "paddingLeft": 0
    },
    "shortcode-alert": {
        "paddingTop": 70,
        "paddingRight": 0,
        "paddingBottom": 30,
        "paddingLeft": 0
    },
    "shortcode-table": {
        "paddingTop": 70,
        "paddingRight": 0,
        "paddingBottom": 10,
        "paddingLeft": 0
    },
    "shortcode-column": {
        "paddingTop": 50,
        "paddingRight": 0,
        "paddingBottom": 10,
        "paddingLeft": 0
    },
    "social-icons i": {
        "color": "#3eb0f7",
        "fontSize": 30,
        "lineHeight": 40
    },
    "alert": {
        "border": "none",
        "borderRadius": 0,
        "position": "relative",
        "fontSize": 17,
        "lineHeight": 22,
        "paddingTop": 16,
        "paddingRight": 16,
        "paddingBottom": 16,
        "paddingLeft": 60
    },
    "alert i": {
        "fontSize": 28,
        "position": "absolute",
        "left": 15,
        "top": 13
    },
    "icon-demo i": {
        "fontSize": 70,
        "marginRight": 20
    },
    "table > thead > tr > th": {
        "background": "#3eb0f7",
        "color": "#fff",
        "borderBottom": 0,
        "textTransform": "uppercase",
        "fontSize": 15,
        "fontWeight": "300",
        "paddingTop": 20,
        "paddingRight": 20,
        "paddingBottom": 20,
        "paddingLeft": 20
    },
    "table > tbody > tr > td": {
        "fontSize": 15,
        "fontWeight": "300",
        "paddingTop": 20,
        "paddingRight": 20,
        "paddingBottom": 20,
        "paddingLeft": 20
    },
    "table-bg > tbody > tr:nth-child(odd) > td": {
        "background": "#fff"
    },
    "table-bg > tbody > tr:nth-child(odd) > th": {
        "background": "#fff"
    },
    "table-bg > tbody > tr:nth-child(even) > td": {
        "background": "#f6f6f6"
    },
    "table-bg > tbody > tr:nth-child(even) > th": {
        "background": "#f6f6f6"
    },
    "scrollToTop": {
        "width": 40,
        "height": 40,
        "paddingTop": 5,
        "paddingRight": 5,
        "paddingBottom": 5,
        "paddingLeft": 5,
        "fontSize": 30,
        "textAlign": "center",
        "background": "rgba(0, 0, 0, 0.2)",
        "color": "white",
        "position": "fixed",
        "bottom": 20,
        "right": 20,
        "borderRadius": "50%",
        "display": "none"
    },
    "scrollToTop:hover": {
        "color": "#3eb0f7"
    },
    "control-group controls": {
        "overflowX": "hidden"
    }
});