import { useState } from "react";
import { useNavigate } from "react-router-dom";
import api from "../api";
import "../assets/css/Authentication.css";

export default function Register() {
    const [form, setForm] = useState({
        nik: "",
        nama: "",
        email: "",
        password: "",
        password_confirmation: "",
        no_hp: "",
        tempat_lahir: "",
        tanggal_lahir: "",
        jenis_kelamin: "laki-laki",
        status_perkawinan: "",
        pekerjaan: "",
        alamat: "",
    });
    const [showPassword, setShowPassword] = useState(false);
    const [errors, setErrors] = useState({});
    const [loading, setLoading] = useState(false);
    const navigate = useNavigate();

    const handleChange = (e) =>
        setForm({ ...form, [e.target.name]: e.target.value });

    const validate = () => {
        const newErrors = {};
        if (!form.email) newErrors.email = true;
        if (!form.password) newErrors.password = true;
        if (!form.nama) newErrors.nama = true;
        if (!form.nik) newErrors.nik = true;
        if (!form.jenis_kelamin) newErrors.jenis_kelamin = true;
        setErrors(newErrors);
        return Object.keys(newErrors).length === 0;
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        if (!validate()) return;
        setLoading(true);
        try {
            await api.post("/register", form);
            alert("Register berhasil, silakan login");
            navigate("/login");
        } catch (err) {
            alert("Register gagal: " + err.response?.data?.message);
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="login-page">
            {/* Panel Kiri — sama seperti Login */}
            <div className="login-panel">
                <div className="panel-logo">
                    <div>
                        <img
                            src="/bpr-white-logo.png"
                            alt="BPR Supra Logo"
                            style={{ width: "60px", height: "40px" }}
                        />
                    </div>
                    <span className="panel-logo-name">BPR Supra</span>
                </div>
                <div className="panel-hero">
                    <h2>PT BPR Supra Artapersada</h2>
                    <p>
                        Solusi keuangan terpercaya untuk masyarakat. Mudah,
                        aman, dan selalu hadir mendukung bisnis Anda.
                    </p>
                </div>
                <div className="panel-dots">
                    <div className="dot" />
                    <div className="dot" />
                    <div className="dot" />
                </div>
            </div>

            {/* Form — PC */}
            <div className="login-right">
                <FormContent
                    form={form}
                    errors={errors}
                    loading={loading}
                    showPassword={showPassword}
                    handleChange={handleChange}
                    handleSubmit={handleSubmit}
                    setShowPassword={setShowPassword}
                />
            </div>

            {/* Header — Mobile */}
            <div className="mobile-header">
                <div className="mobile-logo">
                    <div>
                        <img
                            src="/bpr-white-logo.png"
                            alt="BPR Supra Logo"
                            style={{ width: "50px", height: "30px" }}
                        />
                    </div>
                    <span className="mobile-logo-name">BPR Supra</span>
                </div>
                <div className="mobile-hero">
                    <h2>PT BPR Supra Artapersada</h2>
                    <p>Daftar untuk mulai menggunakan platform kami.</p>
                </div>
            </div>

            {/* Form — Mobile */}
            <div className="mobile-card">
                <FormContent
                    form={form}
                    errors={errors}
                    loading={loading}
                    showPassword={showPassword}
                    handleChange={handleChange}
                    handleSubmit={handleSubmit}
                    setShowPassword={setShowPassword}
                />
            </div>
        </div>
    );
}

function FormContent({
    form,
    errors,
    loading,
    showPassword,
    handleChange,
    handleSubmit,
    setShowPassword,
}) {
    return (
        <div className="form-box">
            <p className="form-title">Daftar Akun</p>
            <p className="form-sub">Isi data lengkap untuk registrasi</p>

            <div className="form-grid">
                <div className="form-field">
                    <label className="f-label">NIK (Sesuai KTP)</label>
                    <div className="f-wrap">
                        <svg
                            className="f-icon"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            strokeWidth="2"
                            strokeLinecap="round"
                            strokeLinejoin="round"
                        >
                            <rect x="3" y="4" width="18" height="16" rx="2" />
                            <path d="M7 8h10" />
                            <path d="M7 12h6" />
                        </svg>
                        <input
                            name="nik"
                            value={form.nik}
                            onChange={handleChange}
                            className={`f-input${errors.nik ? " error" : ""}`}
                            placeholder="Masukkan NIK"
                        />
                    </div>
                </div>

                <div className="form-field">
                    <label className="f-label">Nama (Sesuai KTP)</label>
                    <div className="f-wrap">
                        <svg
                            className="f-icon"
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
                        <input
                            name="nama"
                            value={form.nama}
                            onChange={handleChange}
                            className={`f-input${errors.nama ? " error" : ""}`}
                            placeholder="Masukkan nama"
                        />
                    </div>
                </div>

                <div className="form-field">
                    <label className="f-label">Email</label>
                    <div className="f-wrap">
                        <svg
                            className="f-icon"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            strokeWidth="2"
                            strokeLinecap="round"
                            strokeLinejoin="round"
                        >
                            <rect x="2" y="4" width="20" height="16" rx="2" />
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                        </svg>
                        <input
                            name="email"
                            type="email"
                            placeholder="nama@email.com"
                            value={form.email}
                            onChange={handleChange}
                            className={`f-input${errors.email ? " error" : ""}`}
                        />
                    </div>
                </div>

                <div className="form-field">
                    <label className="f-label">No HP</label>
                    <div className="f-wrap">
                        <svg
                            className="f-icon"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            strokeWidth="2"
                            strokeLinecap="round"
                            strokeLinejoin="round"
                        >
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 3 5.18 2 2 0 0 1 5 3h3a2 2 0 0 1 2 1.72c.12.81.37 1.6.74 2.34a2 2 0 0 1-.45 2.11L9.91 10.09a16 16 0 0 0 6 6l1.92-1.38a2 2 0 0 1 2.11-.45c.74.37 1.53.62 2.34.74A2 2 0 0 1 22 16.92z" />
                        </svg>
                        <input
                            name="no_hp"
                            value={form.no_hp}
                            onChange={handleChange}
                            className="f-input"
                            placeholder="0812xxxx"
                        />
                    </div>
                </div>

                <div className="form-field">
                    <label className="f-label">Password</label>
                    <div className="f-wrap f-wrap-password">
                        <svg
                            className="f-icon"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            strokeWidth="2"
                            strokeLinecap="round"
                            strokeLinejoin="round"
                        >
                            <rect
                                x="3"
                                y="11"
                                width="18"
                                height="11"
                                rx="2"
                                ry="2"
                            />
                            <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                        </svg>
                        <input
                            name="password"
                            type={showPassword ? "text" : "password"}
                            placeholder="Masukkan password"
                            value={form.password}
                            onChange={handleChange}
                            className={`f-input${errors.password ? " error" : ""}`}
                            style={{ paddingRight: 40 }}
                        />
                        <button
                            type="button"
                            className="eye-btn"
                            onClick={() => setShowPassword(!showPassword)}
                            aria-label={
                                showPassword
                                    ? "Sembunyikan password"
                                    : "Tampilkan password"
                            }
                        >
                            {showPassword ? (
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
                                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94" />
                                    <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19" />
                                    <line x1="1" y1="1" x2="23" y2="23" />
                                </svg>
                            ) : (
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
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            )}
                        </button>
                    </div>
                </div>

                <div className="form-field">
                    <label className="f-label">Konfirmasi Password</label>
                    <div className="f-wrap">
                        <svg
                            className="f-icon"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            strokeWidth="2"
                            strokeLinecap="round"
                            strokeLinejoin="round"
                        >
                            <rect
                                x="3"
                                y="11"
                                width="18"
                                height="11"
                                rx="2"
                                ry="2"
                            />
                            <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                        </svg>
                        <input
                            name="password_confirmation"
                            type="password"
                            placeholder="Ulangi password"
                            value={form.password_confirmation}
                            onChange={handleChange}
                            className="f-input"
                        />
                    </div>
                </div>

                <div className="form-field">
                    <label className="f-label">Pekerjaan</label>
                    <div className="f-wrap">
                        <svg
                            className="f-icon"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            strokeWidth="2"
                            strokeLinecap="round"
                            strokeLinejoin="round"
                        >
                            <path d="M6 3h12v4H6z" />
                            <path d="M4 7h16v13a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7z" />
                        </svg>
                        <input
                            name="pekerjaan"
                            value={form.pekerjaan}
                            onChange={handleChange}
                            className="f-input"
                            placeholder="Masukkan pekerjaan"
                        />
                    </div>
                </div>

                <div className="form-field">
                    <label className="f-label">Tempat Lahir</label>
                    <div className="f-wrap">
                        <svg
                            className="f-icon"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            strokeWidth="2"
                            strokeLinecap="round"
                            strokeLinejoin="round"
                        >
                            <path d="M12 21s-6-4.35-6-10a6 6 0 0 1 12 0c0 5.65-6 10-6 10z" />
                            <circle cx="12" cy="11" r="2" />
                        </svg>
                        <input
                            name="tempat_lahir"
                            value={form.tempat_lahir}
                            onChange={handleChange}
                            className="f-input"
                            placeholder="Masukkan tempat lahir"
                        />
                    </div>
                </div>

                <div className="form-field">
                    <label className="f-label">Tanggal Lahir</label>
                    <div className="f-wrap">
                        <svg
                            className="f-icon"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            strokeWidth="2"
                            strokeLinecap="round"
                            strokeLinejoin="round"
                        >
                            <rect
                                x="3"
                                y="4"
                                width="18"
                                height="18"
                                rx="2"
                                ry="2"
                            />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                        <input
                            name="tanggal_lahir"
                            type="date"
                            value={form.tanggal_lahir}
                            onChange={handleChange}
                            className="f-input"
                        />
                    </div>
                </div>

                <div className="form-field">
                    <label className="f-label">Jenis Kelamin</label>
                    <div className="f-wrap">
                        <svg
                            className="f-icon"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            strokeWidth="2"
                            strokeLinecap="round"
                            strokeLinejoin="round"
                        >
                            <circle cx="12" cy="12" r="3" />
                            <path d="M12 2v3" />
                            <path d="M12 19v3" />
                            <path d="M2 12h3" />
                            <path d="M19 12h3" />
                        </svg>
                        <select
                            name="jenis_kelamin"
                            value={form.jenis_kelamin}
                            onChange={handleChange}
                            className="f-input"
                        >
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div className="form-field">
                    <label className="f-label">Status Perkawinan</label>
                    <div className="f-wrap">
                        <svg
                            className="f-icon"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            strokeWidth="2"
                            strokeLinecap="round"
                            strokeLinejoin="round"
                        >
                            <path d="M4 6h16" />
                            <path d="M5 6v14h14V6" />
                            <path d="M8 10h8" />
                        </svg>
                        <input
                            name="status_perkawinan"
                            value={form.status_perkawinan}
                            onChange={handleChange}
                            className="f-input"
                            placeholder="Masukkan status"
                        />
                    </div>
                </div>

                <div className="form-field">
                    <label className="f-label">Alamat</label>
                    <div className="f-wrap">
                        <svg
                            className="f-icon"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            strokeWidth="2"
                            strokeLinecap="round"
                            strokeLinejoin="round"
                        >
                            <path d="M21 10c0 7-9 11-9 11S3 17 3 10a9 9 0 0 1 18 0z" />
                            <circle cx="12" cy="10" r="3" />
                        </svg>
                        <input
                            name="alamat"
                            value={form.alamat}
                            onChange={handleChange}
                            className="f-input"
                            rows={4}
                            placeholder="Citamiang, Kota Sukabumi"
                        />
                    </div>
                </div>
            </div>

            <button
                className="btn-login"
                onClick={handleSubmit}
                disabled={loading}
            >
                {loading ? "Memproses..." : "Daftar"}
            </button>

            <p className="register-text">
                Sudah punya akun? <a href="/login">Login sekarang</a>
            </p>
        </div>
    );
}
