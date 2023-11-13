<?php require_once("header.php"); ?>

<main>
	<div class="container">
		<div class="row">
			<div class="col-4">&nbsp;</div>
			<div class="col-4">
				<h5 class="subTitulo">Buscar string</h5>
				<form action="buscar.php" method="post" id="form">
					<div class="form-group">
						<label for="hash" class="label">Hash</label>
						<input type="text" name="hash" id="hash" class="form-control" placeholder="Hash que deseja pesquisar"/>
					</div>
					<input type="submit" value="Buscar" id="buscar" class="btn btn-success btn-confirm"/>
					<input type="reset" value="Cancelar" class="btn btn-danger btn-cancel"/>
				</form>
				<div id="loading" class="overlay" style="visibility: hidden">
          <i class="fa fa-refresh fa-spin"></i>
        </div>

				<div id="mensagem"></div>
			</div>
			<div class="col-4">&nbsp;</div>
		</div>
	</div>
</main>

<script src="./js/jquery.min.js"></script>
<script src="./js/jquery.validate.min.js"></script>
<script src="./js/additional-methods.min.js"></script>

<script>
	$('#form').validate({
		rules: {
			string: {
				required: true
			}
		},

		messages: {
			string: {
				required: "Insira uma string válida"
			}
		},

		errorElement: 'span',

		errorPlacement: function(error, element) {
      error.addClass('invalid-feedback');
      element.closest('.input-form').append(error);
    },

    highlight: function(element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },

    unhighlight: function(element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
	});

	$('#buscar').click(function(){
		$('#form').submit(function(e){
			if($('#form').valid()){
				$("#loading").css("visibility", "visible");
				var postData = $(this).serializeArray();
				var formURL = $(this).attr('action');

				$.ajax({
					url: formURL,
					type: "POST",
					data: postData,

					success: function(data, textStatus, jqXHR){
						$("#loading").css("visibility", "hidden");
            $("#mensagem").html(data);
					},

					error: function(jqXHR, textStatus, errorThrown){
						$("#loading").css("visibility", "hidden");

            var error = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-ban"></i> ' + textStatus + '</h4>' + errorThrown + '</div>';
            $("#mensagem").html(error);
					}
				});

				e.preventDefault(); //STOP default action
        e.unbind();
			}
			return false;
		});
	});
</script>

<?php require_once("footer.php"); ?>