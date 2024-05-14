import { useAppContext } from "../../../config/context/ComponentContext";



const AdministrateurLogin = () => {
const { handleLogin, navigateTo, user } = useAppContext()
const login = async (e) => { 
  e.preventDefault()
  try {
   await handleLogin({ email: e.target.email.value, password: e.target.password.value }, "admin")
   
  } catch (error) {
    console.log(error);
  }
}
  return (
    <div
      className="w-100 d-flex flex-column justify-content-center align-items-center"
      style={{ minHeight: "100vh" }}
    >
      <div className="card mb-3 w-50">
        <div className="row g-0 d-flex flex-column align-content-center pt-5">
          <div className="col-lg-8">
            <div>
              <img
                src="../pictures/ista.png"
                alt="Trendy Pants and Shoes"
                className="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5"
              />
            </div>
          </div>
          <div className="col-lg-8">
            <div className="card-body py-5 px-md-5">
              <form onSubmit={login}>
                <div data-mdb-input-init className="form-outline mb-4">
                  <label className="form-label" htmlFor="form2Example1">
                    Email address
                  </label>
                  <input
                    type="email"
                    id="form2Example1"
                    className="form-control"
                    placeholder="ex: exemple@ofppt.ma"
                    name="email"
                  />
                  {/* {loginInput.errors.email && <span>{loginInput.errors.email}</span>} */}
                </div>

                <div data-mdb-input-init className="form-outline mb-4">
                  <label className="form-label" htmlFor="form2Example2">
                    Password
                  </label>
                  <input
                    type="password"
                    id="form2Example2"
                    className="form-control"
                    placeholder="ex: ********"
                    name="password"
                  />
                  {/* {loginInput.errors.password && <span>{loginInput.errors.password}</span>} */}
                </div>

                <div className="d-flex justify-content-between align-items-center">
                  <div className="row mb-4">
                    <div className="col d-flex justify-content-center">
                      <div className="col">
                        <a href="#!">Forgot password?</a>
                      </div>
                      <div className="form-check">
                        {/* <input className="form-check-input" type="checkbox" value="" id="form2Example31" checked /> */}
                        {/* <label className="form-check-label" htmlFor="form2Example31"> Remember me </label> */}
                      </div>
                    </div>
                  </div>

                  <div>
                    <button
                      type="submit"
                      data-mdb-button-init
                      data-mdb-ripple-init
                      className="btn btn-primary btn-block mb-4"

                    >
                      Sign in
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default AdministrateurLogin;
