import React, { useEffect, useState } from "react";
import { IconSearch, IconBell } from "./Icons";

export default function Header() {
    const [user, setUser] = useState(null);

    useEffect(() => {
        const storedUser = localStorage.getItem("user");
        if (storedUser) {
            setUser(JSON.parse(storedUser));
        }
    }, []);

    const getInitials = (name) => {
        if (!name) return "??";
        return name
            .split(" ")
            .map((n) => n[0])
            .join("")
            .toUpperCase();
    };

    return (
        <header className="header">
            <div className="search-bar">
                <IconSearch />
                <input type="text" placeholder="Cari sesuatu..." />
            </div>

            <div className="profile-menu">
                <div className="notification-badge">
                    <IconBell />
                    <span className="badge">3</span>
                </div>
                <div className="avatar">
                    <span>{getInitials(user?.nama)}</span>
                </div>
                <div className="profile-info">
                    <span className="profile-name">Hi, {user?.nama}</span>
                </div>
            </div>
        </header>
    );
}
