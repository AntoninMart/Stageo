      <div class="px-4 py-6 pb-4 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
        <div class="container p-4 pt-5 pb-5">
          <div class="row gx-lg-5 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
              <h1 class="my-5 display-4 fw-bold ls-tight">
                The best offer <br />
                <span class="text-primary">for your internship</span>
              </h1>
              <p style="color: hsl(217, 10%, 50.8%)">
                Stageo will help you for your internships thanks 
                to all our ressources and lessons but also our database 
                full of offers in many domains.
              </p>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0">
              <div class="card">
                <div class="card-body py-5 px-md-5">
                  <form method="POST" action="log.php">
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-4">
                        <h4 class="my-6 display-6 fw-bold ls-tight text-center">Connect to your account :</h4>
                    </div>
                    <!-- last name input -->
                      <div class="form-outline mb-4">
                      <input type="text" name="last_name" id="lastn" class="form-control"/>
                      <label class="form-label" for="lastn">Last name</label>
                    </div>
                    <!-- first name input -->
                    <div class="form-outline mb-4">
                      <input type="text" name="first_name" id="firstn" class="form-control"/>
                      <label class="form-label" for="firstn">First name</label>
                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <input type="email" name="identifier" id="identif" class="form-control"/>
                      <label class="form-label" for="identif">identifier</label>
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <input type="password" name="password" id="pass" class="form-control"/>
                      <label class="form-label" for="pass">Password</label>
                    </div>
                    <!-- error message -->
                    <?php if ($error != null): ?>
                    <div class="alert alert-danger">
                      <?= $error ?>
                    </div>
                    <?php endif ?>
                    <!-- Submit button -->
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
                    </div>    
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container pt-5 pb-5"></div>
        <div class="container pt-5 pb-5"></div>
      </div>
