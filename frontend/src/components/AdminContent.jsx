import React, { useEffect, useState } from "react";
import api from "../api";
import { IconUsers, IconDollar, IconBox, IconClock } from "./Icons";

export default function AdminContent({ stats }) {
    const [pengajuan, setPengajuan] = useState([]);
    const [loading, setLoading] = useState(true);
    const [selectedRow, setSelectedRow] = useState(null);
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [formData, setFormData] = useState({
        jumlah_cair: "",
        tanggal_cair: "",
        catatan: "",
        dokumentasi: "",
        dokumen_pendukung: "",
    });

    useEffect(() => {
        const fetchData = async () => {
            try {
                // langsung ambil pengajuan yang disetujui
                const res = await api.get("/pengajuan/disetujui", {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem("token")}`,
                    },
                });
                setPengajuan(res.data.data);
            } catch (err) {
                console.error(err.response?.data || err.message);
            } finally {
                setLoading(false);
            }
        };
        fetchData();
    }, []);

    const openModal = (row) => {
        setSelectedRow(row);
        setFormData({
            jumlah_cair: row.pencairan?.jumlah_cair || "",
            tanggal_cair: row.pencairan?.tanggal_cair || "",
            catatan: row.pencairan?.catatan || "",
            dokumentasi: row.pencairan?.dokumentasi || "",
            dokumen_pendukung: row.pencairan?.dokumen_pendukung || "",
        });
        setIsModalOpen(true);
    };

    const closeModal = () => {
        setIsModalOpen(false);
        setSelectedRow(null);
    };

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSave = async () => {
        try {
            const data = new FormData();
            data.append("jumlah_cair", formData.jumlah_cair);
            data.append("tanggal_cair", formData.tanggal_cair);
            data.append("catatan", formData.catatan);
            if (formData.dokumentasi) {
                data.append("dokumentasi", formData.dokumentasi);
            }
            if (formData.dokumen_pendukung) {
                data.append("dokumen_pendukung", formData.dokumen_pendukung);
            }

            if (selectedRow.pencairan) {
                await api.put(`/pencairan/${selectedRow.pencairan.id}`, data, {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem("token")}`,
                        "Content-Type": "multipart/form-data",
                    },
                });
                alert("Pencairan berhasil diupdate");
            } else {
                await api.post(`/pencairan/${selectedRow.id}`, data, {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem("token")}`,
                        "Content-Type": "multipart/form-data",
                    },
                });
                alert("Pencairan baru berhasil dibuat");
            }

            // refresh data
            const res = await api.get("/pengajuan/disetujui", {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                },
            });
            setPengajuan(res.data.data);

            closeModal();
        } catch (err) {
            console.error("Save error:", err);
        }
    };

    return (
        <div className="content-wrapper">
            {/* Stats Grid */}
            <div className="stats-grid">
                {stats.map((stat, index) => (
                    <div key={index} className="stat-card">
                        <div className="stat-icon-bg">
                            {stat.icon === "users" && (
                                <IconUsers color="#E11D48" size={20} />
                            )}
                            {stat.icon === "dollar" && (
                                <IconDollar color="#E11D48" size={20} />
                            )}
                            {stat.icon === "orders" && (
                                <IconBox color="#E11D48" size={20} />
                            )}
                            {stat.icon === "pending" && (
                                <IconClock color="#E11D48" size={20} />
                            )}
                        </div>
                        <div className="stat-details">
                            <span className="stat-title">{stat.title}</span>
                            <h3 className="stat-value">{stat.value}</h3>
                        </div>
                        <span
                            className={`stat-change ${stat.change.includes("+") ? "positive" : "negative"}`}
                        >
                            {stat.change}
                        </span>
                    </div>
                ))}
            </div>

            {/* Pengajuan Table */}
            <div className="table-container">
                <div className="table-header">
                    <h3>Data Pengajuan Disetujui</h3>
                </div>

                {loading ? (
                    <div>Sedang memuat data...</div>
                ) : pengajuan.length === 0 ? (
                    <div className="empty-state">
                        Semua pengajuan sudah dicairkan
                    </div>
                ) : (
                    <table className="modern-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {pengajuan.map((row) => (
                                <tr key={row.id}>
                                    <td>{row.id}</td>
                                    <td>{row.kode_pengajuan}</td>
                                    <td>
                                        <span
                                            className={`status-badge ${row.status}`}
                                        >
                                            {row.status}
                                        </span>
                                    </td>
                                    <td>
                                        <button
                                            className="btn-edit"
                                            onClick={() => openModal(row)}
                                        >
                                            {row.pencairan ? "Edit" : "Cairkan"}
                                        </button>
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                )}
            </div>

            {/* Modal */}
            {isModalOpen && (
                <div
                    className="modal-overlay"
                    style={{
                        position: "fixed",
                        top: 0,
                        left: 0,
                        width: "100%",
                        height: "100%",
                        backgroundColor: "rgba(0,0,0,0.5)",
                        display: "flex",
                        justifyContent: "center",
                        alignItems: "center",
                        zIndex: 1000,
                    }}
                >
                    <div
                        className="modal-content form-card"
                        style={{
                            backgroundColor: "white",
                            padding: "20px",
                            borderRadius: "8px",
                            maxWidth: "500px",
                            width: "100%",
                            boxShadow: "0 4px 6px rgba(0,0,0,0.1)",
                            maxHeight: "80vh",
                            overflowY: "auto",
                        }}
                    >
                        <h3
                            style={{
                                marginBottom: "24px",
                                color: "#333",
                                fontSize: "20px",
                                fontWeight: "600",
                            }}
                        >
                            {selectedRow.pencairan
                                ? "Edit Pencairan"
                                : "Buat Pencairan"}
                        </h3>
                        <form>
                            <div
                                className="input-wrapper"
                                style={{ marginBottom: "20px" }}
                            >
                                <label
                                    style={{
                                        display: "block",
                                        marginBottom: "8px",
                                        fontWeight: "600",
                                        color: "#555",
                                    }}
                                >
                                    Jumlah Cair
                                </label>
                                <input
                                    type="number"
                                    name="jumlah_cair"
                                    value={formData.jumlah_cair}
                                    onChange={handleChange}
                                    style={{
                                        width: "100%",
                                        padding: "12px",
                                        border: "1px solid #ddd",
                                        borderRadius: "4px",
                                        fontSize: "16px",
                                        backgroundColor: "#fff",
                                    }}
                                />
                            </div>
                            <div
                                className="input-wrapper"
                                style={{ marginBottom: "20px" }}
                            >
                                <label
                                    style={{
                                        display: "block",
                                        marginBottom: "8px",
                                        fontWeight: "600",
                                        color: "#555",
                                    }}
                                >
                                    Tanggal Cair
                                </label>
                                <input
                                    type="date"
                                    name="tanggal_cair"
                                    value={formData.tanggal_cair}
                                    onChange={handleChange}
                                    style={{
                                        width: "100%",
                                        padding: "12px",
                                        border: "1px solid #ddd",
                                        borderRadius: "4px",
                                        fontSize: "16px",
                                        backgroundColor: "#fff",
                                    }}
                                />
                            </div>
                            <div
                                className="input-wrapper"
                                style={{ marginBottom: "20px" }}
                            >
                                <label
                                    style={{
                                        display: "block",
                                        marginBottom: "8px",
                                        fontWeight: "600",
                                        color: "#555",
                                    }}
                                >
                                    Catatan
                                </label>
                                <textarea
                                    name="catatan"
                                    value={formData.catatan}
                                    onChange={handleChange}
                                    style={{
                                        width: "100%",
                                        padding: "12px",
                                        border: "1px solid #ddd",
                                        borderRadius: "4px",
                                        fontSize: "16px",
                                        backgroundColor: "#fff",
                                        minHeight: "80px",
                                        resize: "vertical",
                                    }}
                                ></textarea>
                            </div>
                            <div
                                className="input-wrapper"
                                style={{ marginBottom: "20px" }}
                            >
                                <label
                                    style={{
                                        display: "block",
                                        marginBottom: "8px",
                                        fontWeight: "600",
                                        color: "#555",
                                    }}
                                >
                                    Dokumentasi (PDF)
                                </label>
                                <input
                                    type="file"
                                    name="dokumentasi"
                                    accept="application/pdf"
                                    onChange={(e) =>
                                        setFormData({
                                            ...formData,
                                            dokumentasi: e.target.files[0],
                                        })
                                    }
                                    style={{
                                        width: "100%",
                                        padding: "8px",
                                        border: "1px solid #ddd",
                                        borderRadius: "4px",
                                        backgroundColor: "#fff",
                                    }}
                                />
                            </div>
                            <div
                                className="input-wrapper"
                                style={{ marginBottom: "24px" }}
                            >
                                <label
                                    style={{
                                        display: "block",
                                        marginBottom: "8px",
                                        fontWeight: "600",
                                        color: "#555",
                                    }}
                                >
                                    Dokumen Pendukung (PDF)
                                </label>
                                <input
                                    type="file"
                                    name="dokumen_pendukung"
                                    accept="application/pdf"
                                    onChange={(e) =>
                                        setFormData({
                                            ...formData,
                                            dokumen_pendukung:
                                                e.target.files[0],
                                        })
                                    }
                                    style={{
                                        width: "100%",
                                        padding: "8px",
                                        border: "1px solid #ddd",
                                        borderRadius: "4px",
                                        backgroundColor: "#fff",
                                    }}
                                />
                            </div>
                        </form>
                        <div
                            className="modal-actions"
                            style={{
                                display: "flex",
                                gap: "12px",
                                justifyContent: "flex-end",
                                marginTop: "24px",
                            }}
                        >
                            <button
                                onClick={handleSave}
                                style={{
                                    padding: "10px 20px",
                                    backgroundColor: "#007bff",
                                    color: "white",
                                    border: "none",
                                    borderRadius: "4px",
                                    cursor: "pointer",
                                }}
                            >
                                Simpan
                            </button>
                            <button
                                onClick={closeModal}
                                style={{
                                    padding: "10px 20px",
                                    backgroundColor: "#6c757d",
                                    color: "white",
                                    border: "none",
                                    borderRadius: "4px",
                                    cursor: "pointer",
                                }}
                            >
                                Batal
                            </button>
                        </div>
                    </div>
                </div>
            )}
        </div>
    );
}
