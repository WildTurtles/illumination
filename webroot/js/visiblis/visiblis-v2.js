		parseUri.options = {
			strictMode: false,
			key: ["source","protocol","authority","userInfo","user","password","host","port","relative","path","directory","file","query","anchor"],
			q:   {
				name:   "queryKey",
				parser: /(?:^|&)([^&=]*)=?([^&]*)/g
			},
			parser: {
				strict: /^(?:([^:\/?#]+):)?(?:\/\/((?:(([^:@]*)(?::([^:@]*))?)?@)?([^:\/?#]*)(?::(\d*))?))?((((?:[^?#\/]*\/)*)([^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,
				loose:  /^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/)?((?:(([^:@]*)(?::([^:@]*))?)?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/
			}
		};    
		function parseUri (str) {
			var	o   = parseUri.options,
				m   = o.parser[o.strictMode ? "strict" : "loose"].exec(str),
				uri = {},
				i   = 14;
			while (i--) uri[o.key[i]] = m[i] || "";
			uri[o.q.name] = {};
			uri[o.key[12]].replace(o.q.parser, function ($0, $1, $2) {
				if ($1) uri[o.q.name][$1] = $2;
			});
			return uri;
		};
		function Url_Valide(UrlTest, http_fac) {
			if (http_fac){
				var regexp = new RegExp("^((http|https):\/\/)?(www[.])?([a-zA-Z0-9]|-)+([.][a-zA-Z0-9(\&-|\/|=|?)?]+)+$");
			} else {
				var regexp = new RegExp("^((http|https):\/\/){1}(([a-zA-Z0-9]+):([a-zA-Z0-9]+)\@)?(www[.])?([a-zA-Z0-9]|-)+([.][a-zA-Z0-9_\%(\&-|\/|=|?)?]+)+$");
			}
			return regexp.test(UrlTest);
		}    
		function array_sum(array) {
			var key, sum = 0;
			if (typeof array !== 'object') {
				return null;
			}
			for (key in array) {
				if (!isNaN(parseFloat(array[key]))) {
					sum += parseFloat(array[key]);
				}
			}
			return sum;
		}

		
		
		;(function($) {
			var multipleSupport = typeof $('<input/>')[0].multiple !== 'undefined',isIE = /msie/i.test( navigator.userAgent );
			$.fn.customFile = function() {
				return this.each(function() {
					var $file = $(this).addClass('custom-file-upload-hidden'), // the original file input
					$wrap = $('<div class="file-upload-wrapper">'),
					$input = $('<input type="text" class="file-upload-input" />'),
					$button = $('<span  class="btn file-upload-button">Choisir un fichier <i class="fa fa-file-o"></i></span>'),
					$label = $('<label class="btn file-upload-button" for="'+ $file[0].id +'">Choisir un fichier <i class="fa fa-file-o"></i></label>');
					$file.css({position: 'absolute',left: '-9999px'});
					$wrap.insertAfter( $file ).append( $file, $input, ( isIE ? $label : $button ) );
					$file.attr('tabIndex', -1);
					$button.attr('tabIndex', -1);
					$button.click(function () {
						$file.focus().click();
					});
					$file.change(function() {
						var files = [], fileArr, filename;
						if ( multipleSupport ) {
							fileArr = $file[0].files;
							for ( var i = 0, len = fileArr.length; i < len; i++ ) {
								files.push( fileArr[i].name );
							}
							filename = files.join(', ');
						} else {
							filename = $file.val().split('\\').pop();
						}
						$input.val( filename ).attr('title', filename).focus();
					});
					$input.on({
						blur: function() { $file.trigger('blur'); },
							keydown: function( e ) {
								if ( e.which === 13 ) { 
									if ( !isIE ) { $file.trigger('click'); }
								} else if ( e.which === 8 || e.which === 46 ) {
									$file.replaceWith( $file = $file.clone( true ) );
									$file.trigger('change');
									$input.val('');
								} else if ( e.which === 9 ){
									return;
								} else {
									return false;
								}
							}
						});
					});
				};
				if ( !multipleSupport ) {
					$( document ).on('change', 'input.customfile', function() {
					var $this = $(this), uniqId = 'customfile_'+ (new Date()).getTime(),$wrap = $this.parent(),$inputs = $wrap.siblings().find('.file-upload-input').filter(function(){ return !this.value }),$file = $('<input type="file" id="'+ uniqId +'" name="'+ $this.attr('name') +'"/>');
					setTimeout(function() {
						if ( $this.val() ) {
							if ( !$inputs.length ) {
								$wrap.after( $file );
								$file.customFile();
							}
						} else {
							$inputs.parent().remove();
							$wrap.appendTo( $wrap.parent() );
							$wrap.find('input').focus();
						}
					}, 1);

				});
			}
		}(jQuery));

// Stupid jQuery table plugin.

(function($) {
  $.fn.stupidtable = function(sortFns) {
    return this.each(function() {
      var $table = $(this);
      sortFns = sortFns || {};
      sortFns = $.extend({}, $.fn.stupidtable.default_sort_fns, sortFns);
      $table.data('sortFns', sortFns);

      $table.on("click.stupidtable", "thead th.header", function() {
		$("#loading").css("display","block");
		var val=$(this);
	      setTimeout(function() {  val.stupidsort();}, 500)
      });
    });
  };


  // Expects $("#mytable").stupidtable() to have already been called.
  // Call on a table header.
  $.fn.stupidsort = function(force_direction){
    var $this_th = $(this);
    var th_index = 0; // we'll increment this soon
    var dir = $.fn.stupidtable.dir;
    var $table = $this_th.closest("table");
    var datatype = $this_th.data("sort") || null;

    // No datatype? Nothing to do.
    if (datatype === null) {
      return;
    }

    // Account for colspans
    $this_th.parents("tr").find("th").slice(0, $(this).index()).each(function() {
      var cols = $(this).attr("colspan") || 1;
      th_index += parseInt(cols,10);
    });

    var sort_dir;
    if(arguments.length == 1){
        sort_dir = force_direction;
    }
    else{
        sort_dir = force_direction || $this_th.data("sort-default") || dir.ASC;
        if ($this_th.data("sort-dir"))
           sort_dir = $this_th.data("sort-dir") === dir.ASC ? dir.DESC : dir.ASC;
    }


    $table.trigger("beforetablesort", {column: th_index, direction: sort_dir});

    // More reliable method of forcing a redraw
    $table.css("display");

    // Run sorting asynchronously on a timout to force browser redraw after
    // `beforetablesort` callback. Also avoids locking up the browser too much.
    setTimeout(function() {
      // Gather the elements for this column
      var column = [];
      var sortFns = $table.data('sortFns');
      var sortMethod = sortFns[datatype];
      var trs = $table.children("tbody").children("tr");

      // Extract the data for the column that needs to be sorted and pair it up
      // with the TR itself into a tuple. This way sorting the values will
      // incidentally sort the trs.
      trs.each(function(index,tr) {
        var $e = $(tr).children().eq(th_index);
        var sort_val = $e.data("sort-value");

        // Store and read from the .data cache for display text only sorts
        // instead of looking through the DOM every time
        if(typeof(sort_val) === "undefined"){
          var txt = $e.text();
          $e.data('sort-value', txt);
          sort_val = txt;
        }
        column.push([sort_val, tr]);
      });

      // Sort by the data-order-by value
      column.sort(function(a, b) { return sortMethod(a[0], b[0]); });
      if (sort_dir != dir.ASC)
        column.reverse();

      // Replace the content of tbody with the sorted rows. Strangely
      // enough, .append accomplishes this for us.
      trs = $.map(column, function(kv) { return kv[1]; });
      $table.children("tbody").append(trs);

      // Reset siblings
      $table.find("th").data("sort-dir", null).removeClass("sorting-desc sorting-asc");
      $this_th.data("sort-dir", sort_dir).addClass("sorting-"+sort_dir);

      $table.trigger("aftertablesort", {column: th_index, direction: sort_dir});
      $table.css("display");
    }, 10);

    return $this_th;
  };

  // Call on a sortable td to update its value in the sort. This should be the
  // only mechanism used to update a cell's sort value. If your display value is
  // different from your sort value, use jQuery's .text() or .html() to update
  // the td contents, Assumes stupidtable has already been called for the table.
  $.fn.updateSortVal = function(new_sort_val){
  var $this_td = $(this);
    if($this_td.is('[data-sort-value]')){
      // For visual consistency with the .data cache
      $this_td.attr('data-sort-value', new_sort_val);
    }
    $this_td.data("sort-value", new_sort_val);
    return $this_td;
  };

  // ------------------------------------------------------------------
  // Default settings
  // ------------------------------------------------------------------
  $.fn.stupidtable.dir = {ASC: "asc", DESC: "desc"};
  $.fn.stupidtable.default_sort_fns = {
    "int": function(a, b) {
      return parseInt(a, 10) - parseInt(b, 10);
    },
    "float": function(a, b) {
      return parseFloat(a) - parseFloat(b);
    },
    "string": function(a, b) {
      return a.localeCompare(b);
    },
    "string-ins": function(a, b) {
      a = a.toLocaleLowerCase();
      b = b.toLocaleLowerCase();
      return a.localeCompare(b);
    }
  };
})(jQuery);
		
