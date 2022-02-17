<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
var myModal = document.getElementById('myModal');
var myInput = document.getElementById('myInput');

document.getElementById("btn-remove").addEventListener("click", function(){
  const remove = document.querySelector('#btn-remove');
  document.getElementById("namep").innerHTML  = remove.dataset.namep;
  document.getElementById("idproduct").value = remove.dataset.idp;

});

</script>
</body>
</html>