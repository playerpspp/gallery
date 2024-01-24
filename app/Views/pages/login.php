<?= view('layout/_header') ?>
<?= view('layout/_nav') ?>

<section class="ftco-section contact-section">
	      <div class="container">
	        <div class="row d-flex mb-5 contact-info">
	          <div class="col-md-12 mb-4">
	            <h1 class="h1 font-weight-bold text-center"> Gallery Login</h1>
	          </div>
	         
	        </div>
	        <div class="row block-9">
	          <div class="col-md-12 order-md-last pr-md-5">
                <!-- <a href="home/signup" class="h1 font-weight-bold text-center">Dont Have an account yet? Click here</a> -->
	            <form method="post" action="<?= base_url('home/act_login')?>">
	              <div class="form-group">
                    <h4 class="font-weight-bold control-label">Username</h4>
	                <input type="text" name="username" class="form-control" placeholder="Username">
	              </div>
	              <div class="form-group">
                  <h4 class="font-weight-bold control-label">Password</h4>
	                <input type="password" name="password" class="form-control" placeholder="Password">
	              </div>
	              <div class="form-group">
	                <input type="submit" value="Login" class="btn btn-primary py-3 px-5">
	              </div>
	            </form>
	          
	          </div>

	         
	        </div>
	      </div>
	    </section>
<?= view('layout/_footer') ?>