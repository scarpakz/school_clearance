function loadResults(){
  xhr = $.ajax({
    url: "server_realtime.php",
    type: "GET",
    success: (response) =>{
      var data = JSON.parse(response);
      document.getElementById('osa').innerHTML = data.status[0];
      document.getElementById('cashier').innerHTML = data.status[1];
      document.getElementById('chairman').innerHTML = data.status[2];
    }
  });
}
