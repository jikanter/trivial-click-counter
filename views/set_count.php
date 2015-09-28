<div>
  <script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.min.js"></script>
  <script type="text/javascript">
  var appName = "/click";
  function handleResponse(data) {
      $(".page-count").html('<div class="page-content page-count">Click count is: <span id="count">' + data['count'] + "</span></div>");
    }
    
    $("document").ready(function() { 
        
      var count = parseInt($("#count").html());
      
      function updateCache() {
        count = parseInt($("#count").html());
      }
        
        $("a").click(function(event) { 
          $.ajax("actions.php", {
            data: {"action": "increment", "url": window.location.pathname.substring(appName.length), "count": count},
            dataType: "jsonp",
            jsonp: "handleResponse"
          });
          event.preventDefault();
          updateCache();
      });
    });
  </script>
  
  <a href="#" class="button increment-page-count">Increment Page Count</a>
</div>