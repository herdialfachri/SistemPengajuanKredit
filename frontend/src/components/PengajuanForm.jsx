import React, { useState } from "react";
import api from "../api";
import "../assets/css/PengajuanForm.css";

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
    const [fileName, setFileName] = useState("");

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
        <div className="content-wrapper">
            <div className="form-card">
                {/* Card Header */}
                <div className="form-card-header">
                    <div className="header-icon">
                        <svg
                            width="18"
                            height="18"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="#DC2626"
                            strokeWidth="2"
                            strokeLinecap="round"
                            strokeLinejoin="round"
                        >
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                            <polyline points="14 2 14 8 20 8" />
                            <line x1="16" y1="13" x2="8" y2="13" />
                            <line x1="16" y1="17" x2="8" y2="17" />
                        </svg>
                    </div>
                    <div>
                        <h2>Data Pengajuan</h2>
                        <span className="header-subtitle">
                            Semua field bertanda{" "}
                            <span style={{ color: "#DC2626" }}>*</span> wajib
                            diisi
                        </span>
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
                                    <span className="input-icon">
                                        <svg
                                            width="15"
                                            height="15"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            strokeWidth="2"
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                        >
                                            <rect
                                                x="2"
                                                y="4"
                                                width="20"
                                                height="16"
                                                rx="2"
                                            />
                                            <line
                                                x1="8"
                                                y1="10"
                                                x2="16"
                                                y2="10"
                                            />
                                            <line
                                                x1="8"
                                                y1="14"
                                                x2="12"
                                                y2="14"
                                            />
                                        </svg>
                                    </span>
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
                                    Nama Lengkap{" "}
                                    <span className="required">*</span>
                                </label>
                                <div className="input-wrapper">
                                    <span className="input-icon">
                                        <svg
                                            width="15"
                                            height="15"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            strokeWidth="2"
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                        >
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                            <circle cx="12" cy="7" r="4" />
                                        </svg>
                                    </span>
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
                                    <span className="input-icon">
                                        <svg
                                            width="15"
                                            height="15"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            strokeWidth="2"
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                        >
                                            <rect
                                                x="2"
                                                y="7"
                                                width="20"
                                                height="14"
                                                rx="2"
                                            />
                                            <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" />
                                        </svg>
                                    </span>
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

                            {/* Taksasi */}
                            <div className="form-group">
                                <label>
                                    Taksasi{" "}
                                    <span className="helper-text-inline">
                                        (opsional)
                                    </span>
                                </label>
                                <div className="input-wrapper">
                                    <span className="input-icon">
                                        <svg
                                            width="15"
                                            height="15"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            strokeWidth="2"
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                        >
                                            <line
                                                x1="12"
                                                y1="1"
                                                x2="12"
                                                y2="23"
                                            />
                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                                        </svg>
                                    </span>
                                    <input
                                        type="number"
                                        name="taksasi"
                                        value={formData.taksasi}
                                        onChange={handleChange}
                                        placeholder="Nilai taksasi (Rp)"
                                    />
                                </div>
                            </div>
                        </div>

                        {/* Alamat */}
                        <div className="form-group">
                            <label>
                                Alamat <span className="required">*</span>
                            </label>
                            <div className="input-wrapper">
                                <span className="input-icon icon-top">
                                    <svg
                                        width="15"
                                        height="15"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        strokeWidth="2"
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                    >
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                        <circle cx="12" cy="10" r="3" />
                                    </svg>
                                </span>
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

                        {/* Jumlah Plafon */}
                        <div className="form-group">
                            <label>
                                Jumlah Plafon{" "}
                                <span className="required">*</span>
                            </label>
                            <div className="input-wrapper">
                                <span className="input-icon">
                                    <svg
                                        width="15"
                                        height="15"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        strokeWidth="2"
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                    >
                                        <rect
                                            x="2"
                                            y="5"
                                            width="20"
                                            height="14"
                                            rx="2"
                                        />
                                        <line x1="2" y1="10" x2="22" y2="10" />
                                    </svg>
                                </span>
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
                                <span className="input-icon icon-top">
                                    <svg
                                        width="15"
                                        height="15"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        strokeWidth="2"
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                    >
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                                    </svg>
                                </span>
                                <textarea
                                    name="agunan"
                                    value={formData.agunan}
                                    onChange={handleChange}
                                    placeholder="Deskripsikan agunan yang ditawarkan (misal: BPKB, SHM, dll)"
                                    required
                                />
                            </div>
                        </div>

                        {/* Tujuan Pengajuan */}
                        <div className="form-group">
                            <label>
                                Tujuan Pengajuan{" "}
                                <span className="required">*</span>
                            </label>
                            <div className="input-wrapper">
                                <span className="input-icon icon-top">
                                    <svg
                                        width="15"
                                        height="15"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        strokeWidth="2"
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                    >
                                        <circle cx="12" cy="12" r="10" />
                                        <line x1="12" y1="8" x2="12" y2="12" />
                                        <line
                                            x1="12"
                                            y1="16"
                                            x2="12.01"
                                            y2="16"
                                        />
                                    </svg>
                                </span>
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
                        <div className="form-group">
                            <label>
                                Dokumen Pendukung (PDF){" "}
                                <span className="required">*</span>
                            </label>
                            <label
                                className="file-upload-area"
                                htmlFor="dokumen_input"
                            >
                                <div className="file-upload-icon">
                                    <svg
                                        width="22"
                                        height="22"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="#DC2626"
                                        strokeWidth="2"
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                    >
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                        <polyline points="17 8 12 3 7 8" />
                                        <line x1="12" y1="3" x2="12" y2="15" />
                                    </svg>
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
                                            Klik untuk upload atau drag &amp;
                                            drop
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
                            <svg
                                width="14"
                                height="14"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                strokeWidth="2"
                                strokeLinecap="round"
                                strokeLinejoin="round"
                            >
                                <line x1="19" y1="12" x2="5" y2="12" />
                                <polyline points="12 19 5 12 12 5" />
                            </svg>
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
                                <>
                                    <svg
                                        width="14"
                                        height="14"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        strokeWidth="2"
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                    >
                                        <line x1="22" y1="2" x2="11" y2="13" />
                                        <polygon points="22 2 15 22 11 13 2 9 22 2" />
                                    </svg>
                                    Kirim Pengajuan
                                </>
                            )}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    );
}
