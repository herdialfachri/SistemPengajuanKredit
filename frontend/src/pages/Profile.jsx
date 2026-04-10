import React, { useState, useEffect } from "react";
import Sidebar from "../components/Sidebar";
import Header from "../components/Header";
import { IconUsers } from "../components/Icons";
import api from "../api";
import "../assets/css/Profile.css";

export default function Profile() {
    const [activeMenu, setActiveMenu] = useState("pengaturan");
    const [formData, setFormData] = useState({
        nama: "",
        email: "",
        no_hp: "",
        tempat_lahir: "",
        tanggal_lahir: "",
        jenis_kelamin: "",
        status_perkawinan: "",
        pekerjaan: "",
        alamat: "",
        password: "",
        password_confirmation: "",
    });
    const [loading, setLoading] = useState(false);

    useEffect(() => {
        // ambil data user dari localStorage
        const storedUser = localStorage.getItem("user");
        if (storedUser) {
            const user = JSON.parse(storedUser);
            setFormData((prev) => ({
                ...prev,
                ...user,
                password: "",
                password_confirmation: "",
            }));
        }
    }, []);

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData((prev) => ({ ...prev, [name]: value }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setLoading(true);
        try {
            const res = await api.put("/profile", formData, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                },
            });
            alert(res.data.message);
            localStorage.setItem("user", JSON.stringify(res.data.user));
            window.location.reload();
        } catch (err) {
            alert(
                "Update gagal: " + (err.response?.data?.message || err.message),
            );
        } finally {
            setLoading(false);
        }
    };

    const handleLogout = async () => {
        const token = localStorage.getItem("token");
        try {
            await api.post(
                "/logout",
                {},
                { headers: { Authorization: `Bearer ${token}` } },
            );
            console.log("Logout berhasil di server");
        } catch (err) {
            console.error("Logout error:", err);
        }
        localStorage.removeItem("token");
        localStorage.removeItem("user");
        window.location.href = "/login";
    };

    return (
        <div className="dashboard-container">
            <Sidebar
                activeMenu={activeMenu}
                setActiveMenu={setActiveMenu}
                handleLogout={handleLogout}
            />
            <main className="main-content">
                <Header />
                <div className="content-wrapper">
                    <div className="form-card">
                        <div className="form-card-header">
                            <div>
                                <h3>Ubah Profil</h3>
                            </div>
                        </div>
                        <form onSubmit={handleSubmit} className="form-body">
                            <div className="form-group">
                                <label>Nama</label>
                                <input
                                    type="text"
                                    name="nama"
                                    value={formData.nama}
                                    onChange={handleChange}
                                />
                            </div>
                            <div className="form-group">
                                <label>Email</label>
                                <input
                                    type="email"
                                    name="email"
                                    value={formData.email}
                                    onChange={handleChange}
                                />
                            </div>
                            <div className="form-group">
                                <label>No HP</label>
                                <input
                                    type="text"
                                    name="no_hp"
                                    value={formData.no_hp}
                                    onChange={handleChange}
                                />
                            </div>
                            <div className="form-group">
                                <label>Tempat Lahir</label>
                                <input
                                    type="text"
                                    name="tempat_lahir"
                                    value={formData.tempat_lahir}
                                    onChange={handleChange}
                                />
                            </div>
                            <div className="form-group">
                                <label>Tanggal Lahir</label>
                                <input
                                    type="date"
                                    name="tanggal_lahir"
                                    value={formData.tanggal_lahir}
                                    onChange={handleChange}
                                />
                            </div>
                            <div className="form-group">
                                <label>Jenis Kelamin</label>
                                <select
                                    name="jenis_kelamin"
                                    value={formData.jenis_kelamin}
                                    onChange={handleChange}
                                >
                                    <option value="">-- pilih --</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div className="form-group">
                                <label>Status Perkawinan</label>
                                <input
                                    type="text"
                                    name="status_perkawinan"
                                    value={formData.status_perkawinan}
                                    onChange={handleChange}
                                />
                            </div>
                            <div className="form-group">
                                <label>Pekerjaan</label>
                                <input
                                    type="text"
                                    name="pekerjaan"
                                    value={formData.pekerjaan}
                                    onChange={handleChange}
                                />
                            </div>
                            <div className="form-group full-width">
                                <label>Alamat</label>
                                <textarea
                                    name="alamat"
                                    value={formData.alamat}
                                    onChange={handleChange}
                                ></textarea>
                            </div>
                            <div className="form-group">
                                <label>Password Baru (opsional)</label>
                                <input
                                    type="password"
                                    name="password"
                                    value={formData.password}
                                    onChange={handleChange}
                                />
                            </div>
                            <div className="form-group">
                                <label>Konfirmasi Password</label>
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    value={formData.password_confirmation}
                                    onChange={handleChange}
                                />
                            </div>
                            <div className="form-footer">
                                <button
                                    type="submit"
                                    className="btn btn-primary"
                                    disabled={loading}
                                >
                                    {loading
                                        ? "Menyimpan..."
                                        : "Simpan Perubahan"}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    );
}
