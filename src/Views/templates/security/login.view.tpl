<section class="d-flex justify-content-center   " style="background: linear-gradient(0deg, rgba(176,34,195,1) 0%, rgba(253,187,45,1) 100%); height:100vh;" >
  <form class="border mt-4 bg-light rounded shadow-lg "style="width:400px; height:400px;" method="post" action="index.php?page=sec_login{{if redirto}}&redirto={{redirto}}{{endif redirto}}">
    
      <h1 class="text-center mt-4">Iniciar Sesión</h1>
   
    <section class="d-flex justify-content-center flex-column m-4">
      <div class="d-flex justify-content-center flex-column">
        <label class="text-center mt-2" for="txtEmail">Correo Electrónico</label>
        <div class="d-flex justify-content-center">
          <input class="form-control" type="email" id="txtEmail" name="txtEmail" value="{{txtEmail}}" />
        </div>
        {{if errorEmail}}
          <div class="error col-12 py-2 col-m-8 offset-m-4">{{errorEmail}}</div>
        {{endif errorEmail}}
      </div>
      <div class="row">
        <label class="text-center mt-2" for="txtPswd">Contraseña</label>
        <div class="d-flex justify-content-center">
         <input class="form-control" type="password" id="txtPswd" name="txtPswd" value="{{txtPswd}}" />
        </div>
        {{if errorPswd}}
        <div class="error col-12 py-2 col-m-8 offset-m-4">{{errorPswd}}</div>
        {{endif errorPswd}}
      </div>
    {{if generalError}}
      <div class="row">
        {{generalError}}
      </div>
    {{endif generalError}}
      </section>
    <div class="d-flex justify-content-center mt-3 ">
      <button class="btn btn-primary col-md-6" style="background-color: #F8485E; border: none;" id="btnLogin" type="submit">Iniciar Sesión</button>
    </div>
  
  </form>
</section>
