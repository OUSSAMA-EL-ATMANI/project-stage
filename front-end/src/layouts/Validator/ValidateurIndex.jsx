import React, { useEffect } from "react";
import { Outlet } from "react-router-dom";
import { useAppContext } from "../../config/context/ComponentContext";

const ValidateurIndex = () => {
  const { user, navigateTo } = useAppContext();

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
      <Outlet />
    </div>
  );
};

export default ValidateurIndex;
