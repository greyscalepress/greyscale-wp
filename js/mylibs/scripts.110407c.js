jQuery(document).ready(function(){
  			// alert('ok');
  			jQuery(".group1").colorbox({rel:'group1',opacity:"0.65"});
  			jQuery("a.thickbox").colorbox({rel:'group1',opacity:"0.85", width:"90%", height:"85%"});
  			jQuery(".gallery-item a").colorbox({rel:'group1',opacity:"0.85", width:"90%", height:"85%"});
  			jQuery(".callbacks").colorbox({
  				onOpen:function(){ alert('onOpen: colorbox is about to open'); },
  				onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
  				onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
  				onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
  				onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
  			});
  			
  		});
  		
//