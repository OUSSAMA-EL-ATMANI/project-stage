import { useEffect, useState } from "react";
import { axiosClient } from "../../../config/Api/AxiosClient";
import { useNavigate } from "react-router-dom";

const AddQuestions = () => {
  const [loading, setLoading] = useState(false);
  const [errors, setErrors] = useState({});
  const navigateTo = useNavigate();
  const [filieres, setFilieres] = useState([]);

  const getFilieres = async () => {
    try {
      const { data } = await axiosClient.get("/filiere");
      setFilieres(data.data);
    } catch (error) {
      console.log(error);
    }
  };
  useEffect(() => {
    getFilieres();
  }, []);


  const uploadFile = async (e) => {
    setLoading(true);
    e.preventDefault();
    console.log(e.target.file.files[0]);
    const formData = new FormData();
    formData.append("file", e.target.file.files[0]);
    formData.append("file_name", e.target.file_name.value);
    formData.append("description", e.target.description.value);
    formData.append("filiere_id", e.target.filiere_id.value);
    try {
      const { data } = await axiosClient.post("/designer/upload-questions", formData);
      console.log(data);
      if (data.status === 422) {
        setErrors(data.errors);
        return
      }
      if (data.status === 200) {
        setErrors(null);
        navigateTo("/designer/voir-questions", { replace: true });
      }
      alert(data.message);
    } catch (error) {
      setErrors(error.data.errors);
    } finally {
      setLoading(false);
    }
  };


  return (
    <div className="row g-3">
      <form onSubmit={uploadFile} encType="multipart/form-data">
        <div data-mdb-input-init className="form-outline mb-4">
          <label className="form-label" htmlFor="form2Example1">
            Nom <span className="text text-danger">*</span>
          </label>
          <input
            type="text"
            id="form2Example1"
            className={
              "form-control" + (errors?.file_name ? " is-invalid" : "")
            }
            placeholder="ex: exemple@ofppt.ma"
            name="file_name"
          />
          <span className="text text-danger">{errors?.file_name}</span>
        </div>

        <div data-mdb-input-init className="form-outline mb-4">
          <label className="form-label" htmlFor="form2Example1">
            Description <span className="text text-danger">*</span>
          </label>
          <input
            type="text"
            id="form2Example1"
            className={
              "form-control" + (errors?.description ? " is-invalid" : "")
            }
            placeholder="ex: exemple@ofppt.ma"
            name="description"
          />
          <span className="text text-danger">{errors?.description}</span>
        </div>

        <div data-mdb-input-init className="form-outline mb-4">
          <label className="form-label" htmlFor="form2Example1">
            Exam <span className="text text-danger">*</span>
          </label>
          <input
            type="file"
            id="form2Example1"
            className={
              "form-control" + (errors?.file ? " is-invalid" : "")
            }
            placeholder="ex: exemple@ofppt.ma"
            name="file"
          />
          <span className="text text-danger">{errors?.file}</span>
        </div>

        <div data-mdb-input-init className="form-outline mb-4">
          <label className="form-label" htmlFor="form2Example1">
            Filiere <span className="text text-danger">*</span>
          </label>
          <select name="filiere_id" id="filiere_id">
           {filieres?.map((filiere) => (
             <option key={filiere.id} value={filiere.id}>{filiere.nom}</option>
           ))}
          </select>
          <span className="text text-danger">{errors?.filiere_id}</span>
        </div>

        <div className="d-flex justify-content-center align-items-center">

          <div>
            <button
              type="submit"
              data-mdb-button-init
              data-mdb-ripple-init
              disabled={loading}
              className="btn btn-primary btn-block mb-4"
            >
              {loading ? "Loading..." : "Ajouter"}
            </button>
          </div>
        </div>
      </form>
    </div>
  )
}

export default AddQuestions
