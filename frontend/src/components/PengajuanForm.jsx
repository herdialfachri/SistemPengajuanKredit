import React, { useState, useEffect } from "react";
import { useNavigate } from "react-router-dom";
import api from "../api";
import { IconBox } from "./Icons";
import "../assets/css/PengajuanForm.css";

export default function PengajuanForm() {
    const [formData, setFormData] = useState({
        nik: "",
        nama: "",
        alamat: "",
        profesi: "",
        agunan: "",
        jumlah_plafon: "",
        tujuan_pengajuan: "",
        dokumen_pendukung: null,
        referral_id: "",
    });
    const [loading, setLoading] = useState(false);
    const [fileName, setFileName] = useState("");
    const navigate = useNavigate();

    const handleChange = (e) => {
        const { name, value, files } = e.target;
        if (files) {
            setFileName(files[0]?.name || "");
        }
        setFormData({
            ...formData,
            [name]: files ? files[0] : value,
        });
    };

    const [referrals, setReferrals] = useState([]);

    useEffect(() => {
        const fetchReferrals = async () => {
            try {
                const res = await api.get("/referrals", {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem("token")}`,
                    },
                });
                setReferrals(res.data);
            } catch (err) {
                console.error(err);
            }
        };
        fetchReferrals();
    }, []);

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
            navigate("/");
        } catch (err) {
            console.error(err.response?.data || err.message);
            alert("Gagal mengirim pengajuan");
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="form-card">
            {/* Card Header */}
            <div className="form-card-header">
                <div>
                    <h3>Data Pengajuan</h3>
                </div>
            </div>

            {/* Form Body */}
            <form onSubmit={handleSubmit}>
                <div className="form-body">
                    {/* Section: Data Diri */}
                    <div className="form-divider-label">Data Diri</div>

                    <div className="form-row">
                        {/* NIK */}
                        <div className="form-group">
                            <label>
                                NIK <span className="required">*</span>
                            </label>
                            <div className="input-wrapper">
                                <input
                                    type="text"
                                    name="nik"
                                    value={formData.nik}
                                    onChange={handleChange}
                                    placeholder="Masukkan NIK 16 digit"
                                    required
                                />
                            </div>
                        </div>

                        {/* Nama */}
                        <div className="form-group">
                            <label>
                                Nama Lengkap <span className="required">*</span>
                            </label>
                            <div className="input-wrapper">
                                <input
                                    type="text"
                                    name="nama"
                                    value={formData.nama}
                                    onChange={handleChange}
                                    placeholder="Nama sesuai KTP"
                                    required
                                />
                            </div>
                        </div>
                    </div>

                    <div className="form-row">
                        {/* Profesi */}
                        <div className="form-group">
                            <label>
                                Profesi <span className="required">*</span>
                            </label>
                            <div className="input-wrapper">
                                <input
                                    type="text"
                                    name="profesi"
                                    value={formData.profesi}
                                    onChange={handleChange}
                                    placeholder="cth. Wiraswasta, PNS"
                                    required
                                />
                            </div>
                        </div>

                        {/* Referral Marketing */}
                        <div className="form-group">
                            <label>
                                Referral Marketing{" "}
                                <span className="required">*</span>
                            </label>
                            <div className="input-wrapper">
                                <select
                                    name="referral_id"
                                    value={formData.referral_id}
                                    onChange={handleChange}
                                    required
                                >
                                    <option value="">
                                        -- Pilih Referral --
                                    </option>
                                    {referrals.map((ref) => (
                                        <option key={ref.id} value={ref.id}>
                                            {ref.nama}
                                        </option>
                                    ))}
                                </select>
                            </div>
                        </div>
                    </div>

                    {/* Alamat */}
                    <div className="form-group full-width">
                        <label>
                            Alamat <span className="required">*</span>
                        </label>
                        <div className="input-wrapper">
                            <textarea
                                name="alamat"
                                value={formData.alamat}
                                onChange={handleChange}
                                placeholder="Alamat lengkap sesuai KTP"
                                required
                            />
                        </div>
                    </div>

                    {/* Section: Kredit */}
                    <div className="form-divider-label">Detail Kredit</div>

                    <div className="form-row">
                        {/* Jumlah Plafon */}
                        <div className="form-group">
                            <label>
                                Jumlah Plafon{" "}
                                <span className="required">*</span>
                            </label>
                            <div className="input-wrapper">
                                <input
                                    type="number"
                                    name="jumlah_plafon"
                                    value={formData.jumlah_plafon}
                                    onChange={handleChange}
                                    placeholder="Nominal plafon yang diajukan (Rp)"
                                    required
                                />
                            </div>
                        </div>

                        {/* Agunan */}
                        <div className="form-group">
                            <label>
                                Agunan <span className="required">*</span>
                            </label>
                            <div className="input-wrapper">
                                <input
                                    name="agunan"
                                    value={formData.agunan}
                                    onChange={handleChange}
                                    placeholder="Deskripsikan agunan yang ditawarkan (misal: BPKB, SHM, dll)"
                                    required
                                />
                            </div>
                        </div>
                    </div>

                    {/* Tujuan Pengajuan */}
                    <div className="form-group full-width">
                        <label>
                            Tujuan Pengajuan <span className="required">*</span>
                        </label>
                        <div className="input-wrapper">
                            <textarea
                                name="tujuan_pengajuan"
                                value={formData.tujuan_pengajuan}
                                onChange={handleChange}
                                placeholder="Jelaskan tujuan penggunaan kredit ini"
                                required
                            />
                        </div>
                    </div>

                    {/* Section: Dokumen */}
                    <div className="form-divider-label">Dokumen</div>

                    {/* File Upload */}
                    <div className="form-group full-width">
                        <label>
                            Dokumen Pendukung (PDF){" "}
                            <span className="required">*</span>
                        </label>
                        <label
                            className="file-upload-area"
                            htmlFor="dokumen_input"
                        >
                            <div className="file-upload-icon">
                                <IconBox size={20} color="#dc2626" />
                            </div>
                            {fileName ? (
                                <div className="file-selected">
                                    <span className="file-name">
                                        {fileName}
                                    </span>
                                    <span className="file-change">
                                        Klik untuk ganti file
                                    </span>
                                </div>
                            ) : (
                                <div className="file-placeholder">
                                    <span>
                                        Klik untuk upload atau drag &amp; drop
                                    </span>
                                    <span className="file-hint">
                                        Format PDF, maks. 10MB
                                    </span>
                                </div>
                            )}
                            <input
                                id="dokumen_input"
                                type="file"
                                name="dokumen_pendukung"
                                accept="application/pdf"
                                onChange={handleChange}
                                required
                                style={{ display: "none" }}
                            />
                        </label>
                    </div>
                </div>
                {/* end form-body */}

                {/* Footer */}
                <div className="form-footer">
                    <button
                        type="button"
                        className="btn btn-ghost"
                        onClick={() => window.history.back()}
                    >
                        Kembali
                    </button>
                    <button
                        type="submit"
                        className="btn btn-primary"
                        disabled={loading}
                    >
                        {loading ? (
                            <>
                                <span className="btn-spinner" />
                                Mengirim...
                            </>
                        ) : (
                            <>Kirim Pengajuan</>
                        )}
                    </button>
                </div>
            </form>
        </div>
    );
}
