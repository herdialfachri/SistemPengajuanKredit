import { useState } from "react";
import { useNavigate } from "react-router-dom";
import api from "../api";
import "./style.css";

export default function Pengajuan() {
  const [form, setForm] = useState({
    nik: "",
    nama: "",
    alamat: "",
    profesi: "",
    agunan: "",
    taksasi: "",
    jumlah_plafon: "",
    tujuan_pengajuan: "",
    dokumen_pendukung: ""
  });
  const [errors, setErrors] = useState({});
  const [loading, setLoading] = useState(false);
  const navigate = useNavigate();

  const handleChange = (e) =>
    setForm({ ...form, [e.target.name]: e.target.value });

  const validate = () => {
    const newErrors = {};
    if (!form.nik) newErrors.nik = true;
    if (!form.nama) newErrors.nama = true;
    if (!form.alamat) newErrors.alamat = true;
    if (!form.profesi) newErrors.profesi = true;
    if (!form.agunan) newErrors.agunan = true;
    if (!form.taksasi) newErrors.taksasi = true;
    if (!form.jumlah_plafon) newErrors.jumlah_plafon = true;
    if (!form.tujuan_pengajuan) newErrors.tujuan_pengajuan = true;
    if (!form.dokumen_pendukung) newErrors.dokumen_pendukung = true;
    setErrors(newErrors);
    return Object.keys(newErrors).length === 0;
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    if (!validate()) return;
    setLoading(true);
    try {
      await api.post("/pengajuan", form, {
        headers: { Authorization: `Bearer ${localStorage.getItem("token")}` }
      });
      alert("Pengajuan berhasil dibuat");
      navigate("/dashboard");
    } catch (err) {
      alert("Pengajuan gagal: " + err.response?.data?.message);
    } finally {
      setLoading(false);
    }
  };

  return (
    <div className="login-page">
      {/* Panel kiri */}
      <div className="login-panel">
        <div className="panel-logo">
          <div className="panel-logo-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
              <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" fill="white"/>
            </svg>
          </div>
          <span className="panel-logo-name">MyApp</span>
        </div>
        <div className="panel-hero">
          <h2>Form Pengajuan</h2>
          <p>Isi data pengajuan kredit Anda dengan lengkap.</p>
        </div>
      </div>

      {/* Form — PC */}
      <div className="login-right">
        <FormContent
          form={form}
          errors={errors}
          loading={loading}
          handleChange={handleChange}
          handleSubmit={handleSubmit}
        />
      </div>

      {/* Mobile header */}
      <div className="mobile-header">
        <div className="mobile-logo">
          <div className="mobile-logo-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
              <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" fill="white"/>
            </svg>
          </div>
          <span className="mobile-logo-name">MyApp</span>
        </div>
        <div className="mobile-hero">
          <h2>Pengajuan Kredit</h2>
          <p>Isi data pengajuan Anda</p>
        </div>
      </div>

      {/* Form — Mobile */}
      <div className="mobile-card">
        <FormContent
          form={form}
          errors={errors}
          loading={loading}
          handleChange={handleChange}
          handleSubmit={handleSubmit}
        />
      </div>
    </div>
  );
}

function FormContent({ form, errors, loading, handleChange, handleSubmit }) {
  return (
    <div className="form-box">
      <p className="form-title">Pengajuan Kredit</p>
      <p className="form-sub">Lengkapi data berikut</p>

      {["nik","nama","alamat","profesi","agunan","taksasi","jumlah_plafon","tujuan_pengajuan","dokumen_pendukung"].map((field) => (
        <div key={field}>
          <label className="f-label">{field.replace("_"," ").toUpperCase()}</label>
          <input
            name={field}
            value={form[field]}
            onChange={handleChange}
            className={`f-input${errors[field] ? " error" : ""}`}
          />
        </div>
      ))}

      <button className="btn-login" onClick={handleSubmit} disabled={loading}>
        {loading ? "Memproses..." : "Kirim Pengajuan"}
      </button>
    </div>
  );
}