import React, { createContext, useContext } from "react";
import { useNavigate } from "react-router-dom";
import { axiosClient } from "../Api/AxiosClient";
const Context = createContext( { user: {}, handleLogin: () => {}, navigateTo: () => {} } );

const ComponentContext = ({ children }) => {
  const [user, setUser] = React.useState({});
  const [error, setError] = React.useState({});
  const navigate = useNavigate()


const getUser = async (guard) => {
  const ud = JSON.parse(localStorage.getItem("ud"));
  if (!ud) {
    return false
  }
  if (ud.role !== guard) {
    return false
  }
  try {
    const {data} = await axiosClient.get(`/${guard}/profile`)
    setUser(data.user)
    return true
  } catch (error) {
    console.log(error)
    return false
  }
}
  const handleLogin = async (formData,guard) => {
    try {
      const {data} = await axiosClient.post(`/${guard}/login`, formData)
      localStorage.setItem("ud", JSON.stringify({role: guard, _token: data.token}))
     const state = await getUser(guard) 
     if (state) {
       return true
     }else{
       return false
     }
    } catch (error) {
      console.log(error)
      return false
    }
  }
  return <Context.Provider value={{ user, handleLogin , navigateTo: navigate }}>{children}</Context.Provider>;
};

export default ComponentContext;

export const useAppContext = () => useContext(Context);
