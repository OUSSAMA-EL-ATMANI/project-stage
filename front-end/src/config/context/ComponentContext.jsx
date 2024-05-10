import React, { createContext, useContext } from "react";

const Context = createContext();

const ComponentContext = ({ children }) => {
  return <Context.Provider value={{}}>{children}</Context.Provider>;
};

export default ComponentContext;

export const useAppContext = () => useContext(Context);
