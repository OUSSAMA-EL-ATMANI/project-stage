import React, { useEffect } from "react";
import { Outlet } from "react-router-dom";
import { useAppContext } from "../../config/context/ComponentContext";

const ConcepteurIndex = () => {
  const { navigateTo } = useAppContext();

  useEffect(() => {
    if (
      localStorage.getItem("ud") &&
      JSON.parse(localStorage.getItem("ud")).role === "designer"
    ) {
      document.title = "Designer Dashboard - OFPPT";
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

export default ConcepteurIndex;
