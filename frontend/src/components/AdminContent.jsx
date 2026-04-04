import React, { useEffect, useState } from "react";
import api from "../api";
import { IconUsers, IconDollar, IconBox, IconClock } from "./Icons";

export default function AdminContent({ stats }) {
    const [pengajuan, setPengajuan] = useState([]);
    const [loading, setLoading] = useState(true);

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
                    {/* <button className="btn-view-all">Lihat Semua</button> */}
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
                                <th>Alamat</th>
                                <th>Profesi</th>
                                <th>Jumlah Plafon</th>
                                <th>Tujuan</th>
                                <th>Status</th>
                                <th>Dibuat</th>
                                <th>Dokumen</th>
                            </tr>
                        </thead>
                        <tbody>
                            {pengajuan.map((row) => (
                                <tr key={row.id}>
                                    <td>{row.kode_pengajuan}</td>
                                    <td>{row.nik}</td>
                                    <td className="fw-bold">{row.nama}</td>
                                    <td>{row.alamat}</td>
                                    <td>{row.profesi}</td>
                                    <td>{row.jumlah_plafon}</td>
                                    <td>{row.tujuan_pengajuan}</td>
                                    <td>
                                        <span
                                            className={`status-badge ${row.status}`}
                                        >
                                            {row.status}
                                        </span>
                                    </td>
                                    <td className="text-muted">
                                        {new Date(
                                            row.created_at,
                                        ).toLocaleString("id-ID")}
                                    </td>
                                    <td>
                                        {row.dokumen_pendukung_url ? (
                                            <a
                                                href={row.dokumen_pendukung_url}
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                className="btn-download"
                                            >
                                                Lihat
                                            </a>
                                        ) : (
                                            <span className="text-muted">
                                                Tidak ada
                                            </span>
                                        )}
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                )}
            </div>
        </div>
    );
}
