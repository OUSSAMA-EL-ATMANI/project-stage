import { useEffect, useState } from "react";
import { NavLink, Outlet } from "react-router-dom";
import { useAppContext } from "../../config/context/ComponentContext";
import { axiosClient } from "../../config/Api/AxiosClient";

const ValidateurIndex = () => {
  const { navigateTo } = useAppContext();
  const [logoutLoading, setLogoutLoading] = useState(false);


  useEffect(() => {
    if (
      localStorage.getItem("ud") &&
      JSON.parse(localStorage.getItem("ud")).role === "validator"
    ) {
      document.title = "Validator Dashboard - OFPPT";
    } else {
      navigateTo("/");
    }
  }, []);

  return (
    <div>
      <nav className="navbar navbar-expand-lg bg-body-tertiary">
        <div className="container">
          <a className="navbar-brand" href="#">
            OFPPT
          </a>
          <button
            className="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span className="navbar-toggler-icon" />
          </button>
          <div className="collapse navbar-collapse" id="navbarSupportedContent">
            <ul className="navbar-nav ms-auto mb-2 mb-lg-0">
              <li className="nav-item me-lg-5">
                <NavLink
                  className="nav-link"
                  to="/validateur/questions-meanagment"
                >
                  Manager Questions
                </NavLink>
              </li>
              <li className="nav-item ms-lg-5 ps-lg-2">
                <NavLink
                  className="nav-link"
                  to="/validateur/questions-validated"
                >
                  Question Déja Validé
                </NavLink>
              </li>
              <li className="nav-item ms-lg-5 ps-lg-2">
                <button
                  className="nav-link"
                  disabled={logoutLoading}
                  onClick={async () => {
                    setLogoutLoading(true);
                    await axiosClient.post("validator/logout");
                    setLogoutLoading(false);
                    localStorage.removeItem("ud");
                    navigateTo("/");
                  }}
                >
                  {logoutLoading ? "Logging Out..." : "Logout"}
                </button>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <Outlet />
    </div>
  );
};

export default ValidateurIndex;
