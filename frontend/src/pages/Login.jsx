import { useState } from "react";
import { useNavigate } from "react-router-dom";
import api from "../api";
import "./style.css";

export default function Login() {
    const [form, setForm] = useState({ email: "", password: "" });
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
        setErrors(newErrors);
        return Object.keys(newErrors).length === 0;
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        if (!validate()) return;
        setLoading(true);
        try {
            const res = await api.post("/login", form);

            // simpan token dari response
            localStorage.setItem("token", res.data.token);

            // simpan data user dari response
            localStorage.setItem("user", JSON.stringify(res.data.user));

            // redirect ke dashboard/admin
            navigate("/");
        } catch (err) {
            alert("Login gagal: " + err.response?.data?.message);
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="login-page">
            {/* Panel Kiri — hanya PC */}
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
                    <h2>Kelola bisnis kamu lebih mudah</h2>
                    <p>
                        Platform all-in-one untuk tim modern. Cepat, aman, dan
                        mudah digunakan kapan saja.
                    </p>
                </div>
                <div className="panel-dots">
                    <div className="dot active" />
                    <div className="dot" />
                    <div className="dot" />
                </div>
            </div>

            {/* Form — hanya PC */}
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

            {/* Header — hanya Mobile */}
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
                    <h2>Selamat datang kembali!</h2>
                    <p>Masuk untuk melanjutkan</p>
                </div>
            </div>

            {/* Form — hanya Mobile */}
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
            <p className="form-title">Selamat datang</p>
            <p className="form-sub">Masuk ke akun Anda untuk melanjutkan</p>

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

            <label className="f-label">Password</label>
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
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
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

            <div className="forgot-row">
                <a href="#">Lupa password?</a>
            </div>

            <button
                className="btn-login"
                onClick={handleSubmit}
                disabled={loading}
            >
                <svg
                    width="15"
                    height="15"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    strokeWidth="2.5"
                    strokeLinecap="round"
                    strokeLinejoin="round"
                >
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                    <polyline points="10 17 15 12 10 7" />
                    <line x1="15" y1="12" x2="3" y2="12" />
                </svg>
                {loading ? "Memproses..." : "Masuk"}
            </button>

            <p className="register-text">
                Belum punya akun? <a href="/register">Daftar sekarang</a>
            </p>
        </div>
    );
}
