import React from 'react'

const ValidateurLogin = () => {
  return (
    <div className='w-100 d-flex flex-column justify-content-center align-items-center' style={{ minHeight: "100vh" }}>
      <div class="card mb-3 w-50">
        <div class="row g-0 d-flex flex-column align-content-center pt-5">
          <div class="col-lg-8">
            <div>
              <img src="../pictures/ista.png" alt="Trendy Pants and Shoes"
                class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card-body py-5 px-md-5">

              <form>

                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="form2Example1">Email address</label>
                  <input type="email" id="form2Example1" class="form-control" placeholder='ex: exemple@ofppt.ma' value='' />
                </div>


                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="form2Example2">Password</label>
                  <input type="password" id="form2Example2" class="form-control" placeholder='ex: ********' />
                </div>


                <div className="d-flex justify-content-between align-items-center">
                  <div class="row mb-4">
                    <div class="col d-flex justify-content-center">

                      <div class="col">
                        <a href="#!">Forgot password?</a>
                      </div>
                      <div class="form-check">
                        {/* <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked /> */}
                        {/* <label class="form-check-label" for="form2Example31"> Remember me </label> */}
                      </div>
                    </div>


                  </div>


                  <div>
                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>
                  </div>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  )
}

export default ValidateurLogin
