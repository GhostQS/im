jQuery(document).ready(function(){var a="function"==typeof getAdminbarHeight?getAdminbarHeight():0,b="function"==typeof getStickyHeaderHeight?getStickyHeaderHeight():0;jQuery(window).on("resize scroll",function(){"function"==typeof getAdminbarHeight&&getAdminbarHeight(),"function"==typeof getStickyHeaderHeight&&getStickyHeaderHeight()}),jQuery("body").scrollspy({target:".fusion-menu",offset:parseInt(a+b+1,10)}),jQuery(window).load(function(){var a="function"==typeof getAdminbarHeight?getAdminbarHeight():0,b="function"==typeof getStickyHeaderHeight?getStickyHeaderHeight():0;jQuery("body").data()["bs.scrollspy"].options.offset=parseInt(a+b+1,10)})});