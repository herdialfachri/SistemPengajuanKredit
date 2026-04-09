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
                                        <button onClick={() => openModal(row)}>
                                            {row.pencairan
                                                ? "Edit Pencairan"
                                                : "Buat Pencairan"}
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
                <div className="modal">
                    <div className="modal-content">
                        <h3>
                            {selectedRow.pencairan
                                ? "Edit Pencairan"
                                : "Buat Pencairan"}
                        </h3>
                        <form>
                            <label>Jumlah Cair</label>
                            <input
                                type="number"
                                name="jumlah_cair"
                                value={formData.jumlah_cair}
                                onChange={handleChange}
                            />
                            <label>Tanggal Cair</label>
                            <input
                                type="date"
                                name="tanggal_cair"
                                value={formData.tanggal_cair}
                                onChange={handleChange}
                            />
                            <label>Catatan</label>
                            <textarea
                                name="catatan"
                                value={formData.catatan}
                                onChange={handleChange}
                            ></textarea>
                            <label>Dokumentasi (PDF)</label>
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
                            />

                            <label>Dokumen Pendukung (PDF)</label>
                            <input
                                type="file"
                                name="dokumen_pendukung"
                                accept="application/pdf"
                                onChange={(e) =>
                                    setFormData({
                                        ...formData,
                                        dokumen_pendukung: e.target.files[0],
                                    })
                                }
                            />
                        </form>
                        <div className="modal-actions">
                            <button onClick={handleSave}>Simpan</button>
                            <button onClick={closeModal}>Batal</button>
                        </div>
                    </div>
                </div>
            )}
        </div>
    );
}
