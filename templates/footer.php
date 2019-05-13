<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Click logout to end your session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

    <!-- User Modal-->
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New dashboard user</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="/controller/usercontroller">
          <div class="form-group">
            <input type="email" class="form-control form-control-user" name="mail" placeholder="Email address">
          </div>
          <div class="form-group">
            <input type="password" class="form-control form-control-user" name="pass" placeholder="Create a password">
          </div>          
          <div class="form-group">
              <input type="text" class="form-control form-control-user" name="firstname" placeholder="First name">
          </div>
          <div class="form-group">
              <input type="text" class="form-control form-control-user" name="lastname" placeholder="Last name">
          </div>
          <div class="form-group">
              <input type="text" class="form-control form-control-user" name="company" placeholder="Company name">
          </div>
          <div class="form-group">
            <select name="partner">
              <?php
                $query = "SELECT * FROM `partners`";
                $sql = $con->query($query);
                while($row = $sql->fetch_assoc())
                {
                  $partner_name = $row['name'];

                  echo '
                  <option value="'.$partner_name.'">'.$partner_name.'</option>
                  ';

                }
              ?>
            </select>
          </div>
              <input type="checkbox" name="admin" id="admin" value="1">
              <label for="admin">Is admin?</label><br/>
              <input type="checkbox" name="loyalty" id="loyalty" value="1">
              <label for="loyalty">Access to loyalty</label><br/>
              <input type="checkbox" name="mailchimp" id="mailchimp" value="1">
              <label for="mailchimp">Access to emailings</label><br/>
              <input type="checkbox" name="events" id="events" value="1">
              <label for="events">Access to events</label>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input type="submit" class="btn btn-primary" value="Create">
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Partner Modal -->
    <div class="modal fade" id="partnerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New dashboard user</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="/controller/partnercontroller">
          <div class="form-group">
            <input type="text" class="form-control form-control-user" name="name" placeholder="Partner Name">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input type="submit" class="btn btn-primary" value="Create">
        </div>
        </form>
      </div>
    </div>
  </div>

   <!-- Member Modal-->
   <div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Member information</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="/controller/usercontroller">
          <div class="form-group">
            <input type="email" class="form-control form-control-user" name="mail" placeholder="Email address">
          </div>
          <div class="form-group">
            <input type="password" class="form-control form-control-user" name="pass" placeholder="Create a password">
          </div>          
          <div class="form-group">
              <input type="text" class="form-control form-control-user" name="firstname" placeholder="First name">
          </div>
          <div class="form-group">
              <input type="text" class="form-control form-control-user" name="lastname" placeholder="Last name">
          </div>
          <div class="form-group">
              <input type="text" class="form-control form-control-user" name="company" placeholder="Company name">
          </div>
          <div class="form-group">
              <input type="text" class="form-control form-control-user" name="address" placeholder="Address">
          </div>
          <div class="form-group">
              <input type="text" class="form-control form-control-user" name="city" placeholder="City">
          </div>
          <div class="form-group">
              <input type="text" class="form-control form-control-user" name="zip" placeholder="ZIP code">
          </div>
          <div class="form-group">
              <input type="text" class="form-control form-control-user" name="country" placeholder="Country">
          </div>
              <input type="checkbox" name="admin" id="admin" value="1">
              <label for="admin">Is admin?</label>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input type="submit" class="btn btn-primary" value="Create">
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Mailchimp Modal-->
  <div class="modal fade" id="campaignModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Campaign actions</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body">
                Test
      </div>
    </div>
  </div>

  <!-- Partner Modal -->
  <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New dashboard user</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="/controller/partnercontroller">
          <div class="form-group">
            <input type="text" class="form-control form-control-user" name="name" placeholder="Partner Name">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input type="submit" class="btn btn-primary" value="Create">
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/js/demo/chart-area-demo.js"></script>
  <script src="/js/demo/chart-pie-demo.js"></script>

  <!-- Script for downloadbutton -->
  <script>
    function ToExcelReport(){
    var tab_text="<table border='2px'><tr bgcolor='#FFFFFF'>";
    var textRange; var j=0;
    tab = document.getElementById('tb1'); //id of table

    for(j = 0 ; j < tab.rows.length ; j++){     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); //remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); //remove input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)){
        //if Internet Explorer
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Sample.xls");
    } else{
        //other browsers
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  
    }

    return (sa);
    }
  </script>

<script>
  function initMap() {
      var location = {
          lat: 2,
          lng: 3
      };

      var map = new google.maps.Map(document.getElementById('map')), {
          zoom: 4,
          center: location 
      });
  }
</script>

<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=<?php echo $eventGeocode; ?>&callback=initMap">
</script>

</body>

</html>
