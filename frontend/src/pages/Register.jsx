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
        jenis_kelamin: "",
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
                    <div className="panel-logo-icon">
                        <svg
                            width="18"
                            height="18"
                            viewBox="0 0 24 24"
                            fill="none"
                        >
                            <path
                                d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"
                                fill="white"
                            />
                        </svg>
                    </div>
                    <span className="panel-logo-name">MyApp</span>
                </div>
                <div className="panel-hero">
                    <h2>Buat akun baru</h2>
                    <p>Daftar untuk mulai menggunakan platform kami.</p>
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
                    <div className="mobile-logo-icon">
                        <svg
                            width="18"
                            height="18"
                            viewBox="0 0 24 24"
                            fill="none"
                        >
                            <path
                                d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"
                                fill="white"
                            />
                        </svg>
                    </div>
                    <span className="mobile-logo-name">MyApp</span>
                </div>
                <div className="mobile-hero">
                    <h2>Daftar akun baru</h2>
                    <p>Isi data diri Anda</p>
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

            <label className="f-label">NIK</label>
            <input
                name="nik"
                value={form.nik}
                onChange={handleChange}
                className={`f-input${errors.nik ? " error" : ""}`}
            />

            <label className="f-label">Nama Lengkap</label>
            <input
                name="nama"
                value={form.nama}
                onChange={handleChange}
                className={`f-input${errors.nama ? " error" : ""}`}
            />

            <label className="f-label">Email</label>
            <input
                name="email"
                type="email"
                value={form.email}
                onChange={handleChange}
                className={`f-input${errors.email ? " error" : ""}`}
            />

            <label className="f-label">Password</label>
            <div className="f-wrap">
                <input
                    name="password"
                    type={showPassword ? "text" : "password"}
                    value={form.password}
                    onChange={handleChange}
                    className={`f-input${errors.password ? " error" : ""}`}
                    style={{ paddingRight: 40 }}
                />
                <button
                    type="button"
                    className="eye-btn"
                    onClick={() => setShowPassword(!showPassword)}
                >
                    {showPassword ? "🙈" : "👁️"}
                </button>
            </div>

            <label className="f-label">Konfirmasi Password</label>
            <input
                name="password_confirmation"
                type="password"
                value={form.password_confirmation}
                onChange={handleChange}
                className="f-input"
            />

            <label className="f-label">No HP</label>
            <input
                name="no_hp"
                value={form.no_hp}
                onChange={handleChange}
                className="f-input"
            />

            <label className="f-label">Tempat Lahir</label>
            <input
                name="tempat_lahir"
                value={form.tempat_lahir}
                onChange={handleChange}
                className="f-input"
            />

            <label className="f-label">Tanggal Lahir</label>
            <input
                name="tanggal_lahir"
                type="date"
                value={form.tanggal_lahir}
                onChange={handleChange}
                className="f-input"
            />

            <label className="f-label">Jenis Kelamin</label>
            <select
                name="jenis_kelamin"
                value={form.jenis_kelamin}
                onChange={handleChange}
                className="f-input"
            >
                <option value="">Pilih</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>

            <label className="f-label">Status Perkawinan</label>
            <input
                name="status_perkawinan"
                value={form.status_perkawinan}
                onChange={handleChange}
                className="f-input"
            />

            <label className="f-label">Pekerjaan</label>
            <input
                name="pekerjaan"
                value={form.pekerjaan}
                onChange={handleChange}
                className="f-input"
            />

            <label className="f-label">Alamat</label>
            <textarea
                name="alamat"
                value={form.alamat}
                onChange={handleChange}
                className="f-input"
            ></textarea>

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
