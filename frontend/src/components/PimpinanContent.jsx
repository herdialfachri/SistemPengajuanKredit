import React, { useEffect, useState } from "react";
import api from "../api";
import { IconUsers, IconDollar, IconBox, IconClock } from "./Icons";

export default function PimpinanContent({ stats }) {
    const [pengajuan, setPengajuan] = useState([]);
    const [loading, setLoading] = useState(true);
    const [pimpinanList, setPimpinanList] = useState([]);

    // state untuk edit
    const [editingId, setEditingId] = useState(null);
    const [formData, setFormData] = useState({});
    const [showModal, setShowModal] = useState(false);
    const [expandedRow, setExpandedRow] = useState(null);

    // ambil daftar pimpinan
    useEffect(() => {
        const fetchPimpinan = async () => {
            try {
                const res = await api.get("/pimpinan", {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem("token")}`,
                    },
                });
                setPimpinanList(res.data.data);
            } catch (err) {
                console.error(err.response?.data || err.message);
            }
        };
        fetchPimpinan();
    }, []);

    // ambil data pengajuan
    useEffect(() => {
        const fetchData = async () => {
            try {
                const res = await api.get("/pengajuan", {
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

    // klik edit
    const handleEdit = (row) => {
        setEditingId(row.id);
        setFormData({
            status: row.status,
        });
        setShowModal(true);
    };

    // update data
    const handleUpdate = async () => {
        try {
            await api.put(
                `/pengajuan/${editingId}`,
                { status: formData.status }, // 🔥 cuma ini
                {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem("token")}`,
                    },
                },
            );

            alert("Status berhasil diupdate");

            const res = await api.get("/pengajuan", {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                },
            });

            setPengajuan(res.data.data);
            setShowModal(false);
        } catch (err) {
            console.error(err.response?.data || err.message);
            alert("Gagal update status");
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
                    <h3>Data Pengajuan Kredit</h3>
                </div>

                {loading ? (
                    <div>Sedang memuat data...</div>
                ) : (
                    <table className="modern-table">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Profesi</th>
                                <th>Jumlah Plafon</th>
                                <th>Agunan</th>
                                <th>Taksasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {pengajuan.map((row) => {
                                const isExpanded = expandedRow === row.id;
                                return (
                                    <React.Fragment key={row.id}>
                                        <tr>
                                            <td>{row.kode_pengajuan}</td>
                                            <td>{row.nik}</td>
                                            <td className="fw-bold">
                                                {row.nama}
                                            </td>
                                            <td>{row.profesi}</td>
                                            <td>
                                                {Number(
                                                    row.jumlah_plafon,
                                                ).toLocaleString("id-ID", {
                                                    minimumFractionDigits: 0,
                                                    maximumFractionDigits: 0,
                                                })}
                                            </td>
                                            <td>{row.agunan}</td>
                                            <td>
                                                {row.taksasi
                                                    ? Number(
                                                          row.taksasi,
                                                      ).toLocaleString(
                                                          "id-ID",
                                                          {
                                                              minimumFractionDigits: 0,
                                                              maximumFractionDigits: 0,
                                                          },
                                                      )
                                                    : "Belum diisi"}
                                            </td>
                                            <td>
                                                <span
                                                    className={`status-badge ${row.status}`}
                                                >
                                                    {row.status}
                                                </span>
                                            </td>
                                            <td>
                                                {row.dokumen_pendukung_url ? (
                                                    <button
                                                        className="btn-download"
                                                        onClick={() =>
                                                            window.open(
                                                                row.dokumen_pendukung_url,
                                                                "_blank",
                                                            )
                                                        }
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            fill="currentColor"
                                                            viewBox="0 0 24 24"
                                                        >
                                                            <path d="M6 2h9l5 5v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V3a1 1 0 1 1 1-1zm8 7V3.5L18.5 9H14zM8 13h8v2H8v-2zm0 4h8v2H8v-2z" />
                                                        </svg>
                                                        PDF
                                                    </button>
                                                ) : (
                                                    <span className="text-muted">
                                                        Tidak ada
                                                    </span>
                                                )}

                                                <button
                                                    className="btn-edit"
                                                    onClick={() =>
                                                        handleEdit(row)
                                                    }
                                                    style={{
                                                        marginLeft: "8px",
                                                    }}
                                                >
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <path
                                                            d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 
                         7.04a1.003 1.003 0 0 0 0-1.42l-2.34-2.34a1.003 
                         1.003 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 
                         1.84-1.82z"
                                                        />
                                                    </svg>
                                                    Edit
                                                </button>
                                                <button
                                                    className="btn-edit"
                                                    onClick={() =>
                                                        setExpandedRow(
                                                            isExpanded
                                                                ? null
                                                                : row.id,
                                                        )
                                                    }
                                                    style={{
                                                        marginLeft: "8px",
                                                    }}
                                                >
                                                    {isExpanded
                                                        ? "Tutup"
                                                        : "Detail"}
                                                    {isExpanded ? (
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            fill="currentColor"
                                                            viewBox="0 0 24 24"
                                                        >
                                                            <path d="M7 14l5-5 5 5H7z" />
                                                        </svg>
                                                    ) : (
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            fill="currentColor"
                                                            viewBox="0 0 24 24"
                                                        >
                                                            <path d="M7 10l5 5 5-5H7z" />
                                                        </svg>
                                                    )}
                                                </button>
                                            </td>
                                        </tr>

                                        {isExpanded && (
                                            <tr className="expanded-row">
                                                <td colSpan={10}>
                                                    <div className="expanded-content">
                                                        <p>
                                                            <strong>
                                                                Alamat Lengkap:
                                                            </strong>{" "}
                                                            {row.alamat}
                                                        </p>
                                                        <p>
                                                            <strong>
                                                                Tujuan
                                                                Pengajuan:
                                                            </strong>{" "}
                                                            {
                                                                row.tujuan_pengajuan
                                                            }
                                                        </p>
                                                        <p>
                                                            <strong>
                                                                Referensi:
                                                            </strong>{" "}
                                                            {row.marketing
                                                                ? row.marketing
                                                                      .nama
                                                                : "Belum diisi"}
                                                        </p>
                                                        <p>
                                                            <strong>
                                                                Diajukan Ke:
                                                            </strong>{" "}
                                                            {row.pimpinan
                                                                ? row.pimpinan
                                                                      .nama
                                                                : "Belum diisi"}
                                                        </p>
                                                        <p>
                                                            <strong>
                                                                Tanggal Buat:
                                                            </strong>{" "}
                                                            {new Date(
                                                                row.created_at,
                                                            ).toLocaleDateString(
                                                                "id-ID",
                                                            )}
                                                        </p>
                                                        {/* tambahin field lain sesuai kebutuhan */}
                                                    </div>
                                                </td>
                                            </tr>
                                        )}
                                    </React.Fragment>
                                );
                            })}
                        </tbody>
                    </table>
                )}
            </div>

            {/* Modal Edit */}
            {showModal && (
                <div className="modal">
                    <h3>Edit Status Pengajuan</h3>

                    <select
                        value={formData.status || ""}
                        onChange={(e) =>
                            setFormData({ ...formData, status: e.target.value })
                        }
                    >
                        <option value="">-- Pilih Keputusan --</option>
                        <option value="disetujui">Disetujui</option>
                        <option value="ditolak">Ditolak</option>
                    </select>

                    <div className="modal-actions">
                        <button onClick={handleUpdate} className="btn-save">
                            Simpan
                        </button>
                        <button
                            onClick={() => setShowModal(false)}
                            className="btn-cancel"
                        >
                            Batal
                        </button>
                    </div>
                </div>
            )}
        </div>
    );
}
