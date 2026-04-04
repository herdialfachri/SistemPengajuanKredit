import React, { useState } from "react";
import api from "../api";
import "./PengajuanForm.css"; // CSS terpisah

export default function PengajuanForm() {
  const [formData, setFormData] = useState({
    nik: "",
    nama: "",
    alamat: "",
    profesi: "",
    agunan: "",
    taksasi: "",
    jumlah_plafon: "",
    tujuan_pengajuan: "",
    dokumen_pendukung: null,
  });

  const [loading, setLoading] = useState(false);

  const handleChange = (e) => {
    const { name, value, files } = e.target;
    setFormData({
      ...formData,
      [name]: files ? files[0] : value,
    });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    setLoading(true);

    try {
      const payload = new FormData();
      Object.entries(formData).forEach(([key, value]) => {
        payload.append(key, value);
      });

      const res = await api.post("/pengajuan", payload, {
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
          "Content-Type": "multipart/form-data",
        },
      });

      alert(res.data.message);
    } catch (err) {
      console.error(err.response?.data || err.message);
      alert("Gagal mengirim pengajuan");
    } finally {
      setLoading(false);
    }
  };

  return (
    <div className="form-container">
      <h2>Form Pengajuan Kredit</h2>
      <form onSubmit={handleSubmit} className="styled-form">
        <label>NIK</label>
        <input name="nik" onChange={handleChange} required />

        <label>Nama</label>
        <input name="nama" onChange={handleChange} required />

        <label>Alamat</label>
        <input name="alamat" onChange={handleChange} required />

        <label>Profesi</label>
        <input name="profesi" onChange={handleChange} required />

        <label>Agunan</label>
        <textarea name="agunan" onChange={handleChange} required />

        <label>Taksasi (boleh kosong)</label>
        <input name="taksasi" type="number" onChange={handleChange} />

        <label>Jumlah Plafon</label>
        <input name="jumlah_plafon" type="number" onChange={handleChange} required />

        <label>Tujuan Pengajuan</label>
        <textarea name="tujuan_pengajuan" onChange={handleChange} required />

        <label>Dokumen Pendukung (PDF)</label>
        <input
          type="file"
          name="dokumen_pendukung"
          accept="application/pdf"
          onChange={handleChange}
          required
        />

        <button type="submit" disabled={loading}>
          {loading ? "Mengirim..." : "Kirim Pengajuan"}
        </button>
      </form>
    </div>
  );
}