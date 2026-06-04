<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Admin - GeoToba</title>
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="shortcut icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/favicon.svg">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --sidebar-bg: #ffffff;
            --sidebar-width: 270px;
            --sidebar-text: #64748b;
            --sidebar-text-hover: #0f172a;
            --sidebar-active-bg: #eff6ff; /* Light blue capsule */
            --sidebar-active-text: #2563eb; /* Blue text */
            --sidebar-active-bar: transparent; /* No vertical bar */
            --sidebar-menu-title: #94a3b8;
            --body-bg: #f8fafc;
            --card-bg: #ffffff;
            --card-border: #e2e8f0;
            --card-shadow: 0 1px 3px rgba(0,0,0,0.02), 0 1px 2px rgba(0,0,0,0.04);
            --card-shadow-hover: 0 4px 12px rgba(0,0,0,0.05);
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --text-muted: #94a3b8;
            --accent-blue: #003366; /* Navy Blue Brand Color */
            --accent-gold: #c6a43b; /* Gold Brand Color */
            --border-radius: 12px;
            --border-radius-sm: 8px;
            --border-radius-xs: 6px;
            --transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--body-bg);
            color: var(--text-primary);
            overflow-x: hidden;
        }

        /* ========== SCROLLBAR ========== */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        /* ========== ANIMATIONS ========== */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.2); }
            50% { box-shadow: 0 0 0 8px rgba(59, 130, 246, 0); }
        }

        /* ========== SIDEBAR ========== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100%;
            background: var(--sidebar-bg);
            z-index: 1000;
            overflow-y: auto;
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            border-right: 1px solid #e2e8f0;
        }

        .sidebar::-webkit-scrollbar { width: 4px; }
        .sidebar::-webkit-scrollbar-track { background: transparent; }
        .sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 10px; }

        .sidebar.closed {
            transform: translateX(-100%);
        }

        .sidebar-header {
            padding: 24px;
            border-bottom: 1px solid #f1f5f9;
            position: relative;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #003366, #004d99);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            color: white;
            box-shadow: 0 4px 12px rgba(0, 51, 102, 0.35);
        }

        .sidebar-header h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #f1f5f9;
            letter-spacing: -0.02em;
        }

        .sidebar-header h3 span {
            background: linear-gradient(135deg, #60a5fa, #a78bfa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .sidebar-header p {
            font-size: 0.7rem;
            color: #64748b;
            margin-top: 2px;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .sidebar-menu {
            padding: 16px 0;
        }

        .sidebar-menu .menu-title {
            padding: 16px 24px 8px;
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--sidebar-menu-title);
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 20px;
            color: var(--sidebar-text);
            text-decoration: none;
            transition: var(--transition);
            font-size: 0.84rem;
            font-weight: 500;
            margin: 2px 12px;
            border-radius: var(--border-radius-xs);
            position: relative;
        }

        .sidebar-menu a:hover {
            background: rgba(255,255,255,0.06);
            color: var(--sidebar-text-hover);
            transform: translateX(3px);
        }

        .sidebar-menu a.active {
            background: var(--sidebar-active-bg);
            color: var(--sidebar-active-text);
        }

        .sidebar-menu a.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 60%;
            background: var(--sidebar-active-bar);
            border-radius: 0 4px 4px 0;
        }

        .sidebar-menu a i {
            width: 20px;
            font-size: 0.95rem;
            text-align: center;
            transition: var(--transition);
        }

        .sidebar-menu a:hover i {
            transform: scale(1.1);
        }

        /* ========== SIDEBAR OVERLAY ========== */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(4px);
            z-index: 999;
        }

        /* ========== MAIN CONTENT ========== */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 24px 32px;
            min-height: 100vh;
            transition: margin-left 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            animation: fadeIn 0.5s ease;
        }

        .main-content.expanded {
            margin-left: 0;
        }

        /* ========== TOP BAR ========== */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
            flex-wrap: wrap;
            gap: 12px;
            animation: fadeInUp 0.5s ease;
        }

        .menu-toggle {
            display: none;
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            padding: 10px 14px;
            border-radius: var(--border-radius-xs);
            cursor: pointer;
            font-size: 1rem;
            color: var(--text-secondary);
            transition: var(--transition);
            box-shadow: var(--card-shadow);
        }

        .menu-toggle:hover {
            background: #f8fafc;
            color: var(--accent-blue);
            border-color: var(--accent-blue);
        }

        .page-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--text-primary);
            letter-spacing: -0.02em;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 12px;
            background: var(--card-bg);
            padding: 6px 8px 6px 16px;
            border-radius: 50px;
            border: 1px solid var(--card-border);
            box-shadow: var(--card-shadow);
            transition: var(--transition);
        }

        .user-menu:hover {
            box-shadow: var(--card-shadow-hover);
        }

        .user-name {
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .user-name i {
            font-size: 1.2rem;
            color: var(--accent-blue);
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .logout-btn {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #dc2626;
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .logout-btn:hover {
            background: linear-gradient(135deg, #fecaca, #fca5a5);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(220,38,38,0.2);
        }

        /* ========== STATISTICS CARDS ========== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: var(--card-bg);
            padding: 22px;
            border-radius: var(--border-radius);
            border: 1px solid var(--card-border);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.5s ease both;
            box-shadow: var(--card-shadow);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
            opacity: 0;
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--card-shadow-hover);
        }

        .stat-card:hover::before {
            opacity: 1;
        }

        .stat-card:nth-child(1)::before { background: linear-gradient(90deg, #3b82f6, #60a5fa); }
        .stat-card:nth-child(2)::before { background: linear-gradient(90deg, #6366f1, #a78bfa); }
        .stat-card:nth-child(3)::before { background: linear-gradient(90deg, #10b981, #34d399); }
        .stat-card:nth-child(4)::before { background: linear-gradient(90deg, #f59e0b, #fbbf24); }
        .stat-card:nth-child(5)::before { background: linear-gradient(90deg, #f43f5e, #fb7185); }
        .stat-card:nth-child(6)::before { background: linear-gradient(90deg, #8b5cf6, #a78bfa); }
        .stat-card:nth-child(7)::before { background: linear-gradient(90deg, #06b6d4, #22d3ee); }
        .stat-card:nth-child(8)::before { background: linear-gradient(90deg, #ec4899, #f472b6); }

        .stat-card-inner {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
            flex-shrink: 0;
        }

        .stat-icon.blue { background: linear-gradient(135deg, #dbeafe, #bfdbfe); color: #2563eb; }
        .stat-icon.indigo { background: linear-gradient(135deg, #e0e7ff, #c7d2fe); color: #4f46e5; }
        .stat-icon.emerald { background: linear-gradient(135deg, #d1fae5, #a7f3d0); color: #059669; }
        .stat-icon.amber { background: linear-gradient(135deg, #fef3c7, #fde68a); color: #d97706; }
        .stat-icon.rose { background: linear-gradient(135deg, #ffe4e6, #fecdd3); color: #e11d48; }
        .stat-icon.purple { background: linear-gradient(135deg, #ede9fe, #ddd6fe); color: #7c3aed; }
        .stat-icon.cyan { background: linear-gradient(135deg, #cffafe, #a5f3fc); color: #0891b2; }
        .stat-icon.pink { background: linear-gradient(135deg, #fce7f3, #fbcfe8); color: #db2777; }

        .stat-info {
            flex: 1;
        }

        .stat-number {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--text-primary);
            line-height: 1;
            letter-spacing: -0.03em;
        }

        .stat-label {
            font-size: 0.72rem;
            color: var(--text-muted);
            margin-top: 6px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ========== TABLE CARD ========== */
        .card-table {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 24px;
            margin-bottom: 24px;
            border: 1px solid var(--card-border);
            box-shadow: var(--card-shadow);
            animation: fadeInUp 0.6s ease both;
        }

        .card-header-custom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .card-header-custom h5,
        .card-table h5 {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-header-custom h5 i,
        .card-table h5 i {
            color: var(--accent-blue);
        }

        /* Bootstrap card override */
        .card {
            background: var(--card-bg);
            border-radius: var(--border-radius) !important;
            border: 1px solid var(--card-border) !important;
            box-shadow: var(--card-shadow) !important;
            animation: fadeInUp 0.5s ease both;
            overflow: hidden;
        }

        .card .card-header {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9) !important;
            border-bottom: 1px solid var(--card-border) !important;
            padding: 18px 24px !important;
        }

        .card .card-header h5 {
            margin: 0;
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .card .card-body {
            padding: 24px !important;
        }

        /* ========== BUTTONS ========== */
        .btn-primary {
            background: linear-gradient(135deg, #3b82f6, #2563eb) !important;
            color: white !important;
            padding: 10px 22px;
            border-radius: var(--border-radius-xs);
            font-size: 0.82rem;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(59,130,246,0.25);
            letter-spacing: 0.01em;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #2563eb, #1d4ed8) !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59,130,246,0.35) !important;
            color: white !important;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.85rem;
            margin-bottom: 20px;
            transition: var(--transition);
            font-weight: 500;
        }

        .btn-back:hover {
            color: var(--accent-blue);
            transform: translateX(-3px);
        }

        /* ── SIMPAN / SUBMIT — Hijau ── */
        .btn-submit {
            background: linear-gradient(135deg, #10b981, #34d399);
            color: white;
            padding: 12px 30px;
            border-radius: var(--border-radius-sm);
            font-size: 0.88rem;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 14px rgba(16,185,129,0.3);
            letter-spacing: 0.02em;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #059669, #10b981);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16,185,129,0.4);
        }

        /* ── BATAL / CANCEL — Merah ── */
        .btn-cancel {
            background: linear-gradient(135deg, #f43f5e, #fb7185);
            color: white;
            padding: 12px 30px;
            border-radius: var(--border-radius-sm);
            font-size: 0.88rem;
            font-weight: 700;
            text-decoration: none;
            transition: var(--transition);
            display: inline-block;
            box-shadow: 0 4px 14px rgba(244,63,94,0.25);
            letter-spacing: 0.02em;
        }

        .btn-cancel:hover {
            background: linear-gradient(135deg, #e11d48, #f43f5e);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(244,63,94,0.35);
        }

        /* ── Form submit = Hijau ── */
        form button.btn.btn-primary,
        button[type="submit"].btn.btn-primary {
            background: linear-gradient(135deg, #10b981, #34d399) !important;
            color: #fff !important;
            padding: 12px 30px !important;
            border-radius: var(--border-radius-sm) !important;
            font-size: 0.88rem !important;
            font-weight: 700 !important;
            border: none !important;
            cursor: pointer;
            transition: var(--transition) !important;
            box-shadow: 0 4px 14px rgba(16,185,129,0.3) !important;
        }
        form button.btn.btn-primary:hover,
        button[type="submit"].btn.btn-primary:hover {
            background: linear-gradient(135deg, #059669, #10b981) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 6px 20px rgba(16,185,129,0.4) !important;
        }

        /* ── Batal = Merah ── */
        .btn.btn-secondary,
        a.btn.btn-secondary {
            background: linear-gradient(135deg, #f43f5e, #fb7185) !important;
            color: #fff !important;
            padding: 12px 30px !important;
            border-radius: var(--border-radius-sm) !important;
            font-size: 0.88rem !important;
            font-weight: 700 !important;
            text-decoration: none;
            transition: var(--transition) !important;
            display: inline-block;
            box-shadow: 0 4px 14px rgba(244,63,94,0.25) !important;
            border: none !important;
        }
        .btn.btn-secondary:hover,
        a.btn.btn-secondary:hover {
            background: linear-gradient(135deg, #e11d48, #f43f5e) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 6px 20px rgba(244,63,94,0.35) !important;
        }

        /* ── Tombol tambah di index = Biru ── */
        a.btn.btn-primary {
            background: linear-gradient(135deg, #3b82f6, #6366f1) !important;
            color: white !important;
            box-shadow: 0 4px 14px rgba(59,130,246,0.25) !important;
        }
        a.btn.btn-primary:hover {
            background: linear-gradient(135deg, #2563eb, #4f46e5) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 6px 20px rgba(59,130,246,0.35) !important;
        }

        /* ========== FORM STYLES ========== */
        .form-page {
            max-width: 800px;
            margin: 0 auto;
        }

        .form-card {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 36px;
            border: 1px solid var(--card-border);
            box-shadow: var(--card-shadow);
            animation: fadeInUp 0.5s ease both;
        }

        .form-card h2 {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 8px;
        }

        .form-card p {
            color: var(--text-muted);
            font-size: 0.85rem;
            margin-bottom: 28px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }

        .form-group .required {
            color: var(--accent-rose);
        }

        .form-control {
            width: 100%;
            padding: 11px 14px;
            border: 1.5px solid #e2e8f0;
            border-radius: var(--border-radius-sm);
            font-size: 0.85rem;
            transition: var(--transition);
            background: #f8fafc;
            color: var(--text-primary);
            font-family: 'Inter', sans-serif;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 4px rgba(59,130,246,0.1);
            background: white;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 110px;
        }

        select.form-control {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath d='M6 8L1 3h10z' fill='%2394a3b8'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            padding-right: 36px;
        }

        .form-group small {
            display: block;
            font-size: 0.7rem;
            color: var(--text-muted);
            margin-top: 6px;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 20px 0;
        }

        .form-check input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
            accent-color: var(--accent-blue);
            border-radius: 4px;
        }

        .form-check label {
            font-size: 0.85rem;
            color: var(--text-secondary);
            cursor: pointer;
            font-weight: 500;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 28px;
            padding-top: 24px;
            border-top: 1px solid var(--card-border);
        }

        /* Bootstrap mb-3 form groups */
        .mb-3 label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }

        .mb-3 input[type="checkbox"] {
            width: 20px;
            height: 20px;
            accent-color: var(--accent-blue);
            cursor: pointer;
            vertical-align: middle;
            margin-right: 8px;
        }

        /* ========== TABLE STYLES ========== */
        .table-responsive {
            overflow-x: auto;
            border-radius: var(--border-radius-sm);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            min-width: 600px;
        }

        thead {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        }

        th {
            text-align: left;
            padding: 14px 12px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--text-secondary);
            border-bottom: 2px solid #e2e8f0;
        }

        td {
            padding: 14px 12px;
            font-size: 0.85rem;
            color: var(--text-secondary);
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
            transition: var(--transition);
        }

        tbody tr {
            transition: var(--transition);
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        tbody tr:hover td {
            color: var(--text-primary);
        }

        /* ========== BADGES ========== */
        .badge {
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.02em;
        }

        .badge-success, .bg-success {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0) !important;
            color: #065f46 !important;
        }

        .badge-danger, .bg-danger {
            background: linear-gradient(135deg, #ffe4e6, #fecdd3) !important;
            color: #9f1239 !important;
        }

        .badge-primary, .bg-primary {
            background: linear-gradient(135deg, #e0e7ff, #c7d2fe) !important;
            color: #3730a3 !important;
        }

        .badge-warning, .bg-warning {
            background: linear-gradient(135deg, #fef3c7, #fde68a) !important;
            color: #92400e !important;
        }

        .badge-secondary, .bg-secondary {
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0) !important;
            color: #475569 !important;
        }

        .bg-info {
            background: linear-gradient(135deg, #dbeafe, #bfdbfe) !important;
            color: #1e40af !important;
        }

        .badge-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
            padding: 4px 8px;
            border-radius: 10px;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-secondary);
        }

        /* ========== ACTION BUTTONS ========== */
        .btn-group {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        /* ── EDIT — Biru ── */
        .btn-edit, .btn-warning, .btn-sm.btn-warning {
            background: linear-gradient(135deg, #3b82f6, #60a5fa) !important;
            color: #fff !important;
            padding: 7px 16px;
            border-radius: var(--border-radius-xs);
            font-size: 0.75rem;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 5px;
            box-shadow: 0 2px 8px rgba(59,130,246,0.2);
            border: none !important;
        }

        .btn-edit:hover, .btn-warning:hover, .btn-sm.btn-warning:hover {
            background: linear-gradient(135deg, #2563eb, #3b82f6) !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 14px rgba(59,130,246,0.3) !important;
            color: #fff !important;
        }

        /* ── HAPUS — Merah ── */
        .btn-delete, .btn-sm.btn-danger {
            background: linear-gradient(135deg, #f43f5e, #fb7185) !important;
            color: #fff !important;
            padding: 7px 16px;
            border-radius: var(--border-radius-xs);
            font-size: 0.75rem;
            font-weight: 600;
            border: none !important;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 5px;
            box-shadow: 0 2px 8px rgba(244,63,94,0.2);
        }

        .btn-delete:hover, .btn-sm.btn-danger:hover {
            background: linear-gradient(135deg, #e11d48, #f43f5e) !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 14px rgba(244,63,94,0.3) !important;
            color: #fff !important;
        }

        /* ========== IMAGE PREVIEW ========== */
        .img-preview {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #f1f5f9;
            transition: var(--transition);
        }

        .img-preview:hover {
            transform: scale(1.15);
            border-color: var(--accent-blue);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .img-placeholder {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.65rem;
            color: var(--text-muted);
        }

        /* ========== ALERT ========== */
        .alert-success {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
            padding: 14px 20px;
            border-radius: var(--border-radius-sm);
            margin-bottom: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            border-left: 4px solid #10b981;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: fadeInUp 0.3s ease;
        }

        .alert-danger {
            background: linear-gradient(135deg, #ffe4e6, #fecdd3);
            color: #9f1239;
            padding: 14px 20px;
            border-radius: var(--border-radius-sm);
            margin-bottom: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            border-left: 4px solid #f43f5e;
            animation: fadeInUp 0.3s ease;
        }

        /* ========== EMPTY STATE ========== */
        .empty-state {
            text-align: center;
            padding: 50px 20px;
            color: var(--text-muted);
        }

        .empty-state i {
            font-size: 2.5rem;
            margin-bottom: 12px;
            opacity: 0.4;
        }

        /* ========== CAPSULE PILLS STYLING ========== */
        .btn-edit-pill {
            background: #ede9fe !important;
            color: #7c3aed !important;
            padding: 6px 14px !important;
            border-radius: 50px !important;
            font-size: 0.72rem !important;
            font-weight: 600 !important;
            text-decoration: none !important;
            border: none !important;
            display: inline-block;
            transition: all 0.2s ease;
        }
        .btn-edit-pill:hover {
            background: #ddd6fe !important;
            color: #7c3aed !important;
            transform: translateY(-1px);
        }
        .btn-delete-pill {
            background: #ffe4e6 !important;
            color: #e11d48 !important;
            padding: 6px 14px !important;
            border-radius: 50px !important;
            font-size: 0.72rem !important;
            font-weight: 600 !important;
            text-decoration: none !important;
            border: none !important;
            display: inline-block;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .btn-delete-pill:hover {
            background: #fecdd3 !important;
            color: #e11d48 !important;
            transform: translateY(-1px);
        }
        .btn-add-pill {
            background: #003366 !important;
            color: #ffffff !important;
            padding: 8px 18px !important;
            border-radius: 50px !important;
            font-size: 0.75rem !important;
            font-weight: 600 !important;
            text-decoration: none !important;
            border: none !important;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
            box-shadow: 0 2px 6px rgba(0, 51, 102, 0.15);
        }
        .btn-add-pill:hover {
            background: #c6a43b !important;
            color: #ffffff !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(198, 164, 59, 0.2);
        }
        .badge-status-active {
            background-color: #d1fae5 !important;
            color: #065f46 !important;
            font-size: 0.72rem !important;
            font-weight: 600 !important;
            padding: 6px 12px !important;
            border-radius: 50px !important;
            display: inline-block;
        }
        .badge-status-inactive {
            background-color: #fee2e2 !important;
            color: #9f1239 !important;
            font-size: 0.72rem !important;
            font-weight: 600 !important;
            padding: 6px 12px !important;
            border-radius: 50px !important;
            display: inline-block;
        }

        /* ========== PAGINATION ========== */
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 6px;
            list-style: none;
            padding: 0;
        }

        .pagination .page-link {
            border-radius: var(--border-radius-xs) !important;
            font-size: 0.8rem;
            font-weight: 500;
            border: 1px solid var(--card-border);
            color: var(--text-secondary);
            padding: 8px 14px;
            transition: var(--transition);
            text-decoration: none;
            display: inline-block;
        }

        .pagination .page-link:hover {
            background: var(--accent-gold);
            border-color: var(--accent-gold);
            color: white;
        }

        .pagination .page-item.active .page-link {
            background: var(--accent-blue) !important;
            border-color: var(--accent-blue) !important;
            color: white !important;
        }

        .pagination .page-item-prev .page-link,
        .pagination .page-item-next .page-link {
            background: var(--accent-blue) !important;
            color: white !important;
            border-color: var(--accent-blue) !important;
            font-weight: 600;
        }

        .pagination .page-item-prev .page-link:hover,
        .pagination .page-item-next .page-link:hover {
            background: var(--accent-gold) !important;
            border-color: var(--accent-gold) !important;
            color: white !important;
        }

        .pagination .page-item-prev.disabled .page-link,
        .pagination .page-item-next.disabled .page-link {
            background: #e2e8f0 !important;
            color: #94a3b8 !important;
            border-color: #e2e8f0 !important;
            cursor: not-allowed;
            pointer-events: none;
        }

        /* ========== ACTION BUTTONS GRID (Dashboard) ========== */
        .action-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 8px;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            background: var(--card-bg);
            border: 1.5px solid var(--card-border);
            border-radius: 50px;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 600;
            transition: var(--transition);
            box-shadow: var(--card-shadow);
        }

        .action-btn:hover {
            border-color: var(--accent-blue);
            color: var(--accent-blue);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59,130,246,0.12);
        }

        .action-btn i {
            font-size: 0.85rem;
        }

        /* ========== d-flex and other Bootstrap utilities ========== */
        .d-flex { display: flex !important; }
        .d-inline { display: inline !important; }
        .justify-content-between { justify-content: space-between !important; }
        .align-items-center { align-items: center !important; }
        .mb-0 { margin-bottom: 0 !important; }
        .mb-3 { margin-bottom: 16px !important; }
        .mt-2 { margin-top: 8px !important; }
        .text-center { text-align: center !important; }
        .text-muted { color: var(--text-muted) !important; }
        .btn-sm { padding: 7px 16px !important; font-size: 0.75rem !important; }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 1400px) {
            .stats-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
                box-shadow: 8px 0 30px rgba(0,0,0,0.3);
            }

            .sidebar-overlay.active {
                display: block;
            }

            .main-content {
                margin-left: 0;
                padding: 16px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }

            .card-header-custom {
                flex-direction: column;
                align-items: flex-start;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .form-card {
                padding: 20px;
            }

            .page-title {
                font-size: 1.15rem;
            }

            .top-bar {
                flex-wrap: wrap;
            }

            .user-menu {
                padding: 4px 8px 4px 12px;
            }

            .user-name {
                font-size: 0.75rem;
            }

            .stat-card {
                padding: 16px;
            }

            .stat-number {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 576px) {
            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }

            .top-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .user-menu {
                justify-content: space-between;
            }

            th, td {
                font-size: 0.72rem;
                padding: 10px 6px;
            }

            .btn-edit, .btn-delete,
            .btn-sm.btn-warning, .btn-sm.btn-danger {
                padding: 5px 10px !important;
                font-size: 0.65rem !important;
            }

            .stat-icon {
                width: 40px;
                height: 40px;
                font-size: 0.95rem;
            }

            .card-table {
                padding: 16px;
            }

            .form-card {
                padding: 16px;
                border-radius: var(--border-radius-sm);
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .btn-group {
                flex-direction: column;
                gap: 4px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .action-btn {
                justify-content: center;
            }
        }
    </style>
    @stack('styles')
</head>
<body>

<!-- SIDEBAR OVERLAY -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-brand" style="display:flex; align-items:center; gap: 10px;">
            <img src="/image/logo/geotoba-globe.svg" alt="GeoToba Logo" style="width:44px;height:44px;border-radius:50%;object-fit:contain;flex-shrink:0;">
            <div>
                <h3 style="font-size: 1.45rem; font-weight: 800; color: #003366; font-family: 'Inter', sans-serif; letter-spacing: -0.5px; margin:0;">Geo<span style="color: #c6a43b;">Toba</span></h3>
                <p style="font-size: 0.65rem; color: #94a3b8; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-top: 2px; margin-bottom: 0;">Administrator</p>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <div class="menu-title">Menu</div>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-chart-pie"></i> Dashboard
        </a>
        
        <div class="menu-title">Konten</div>
        <a href="{{ route('admin.home-settings.index') }}" class="{{ request()->routeIs('admin.home-settings.*') ? 'active' : '' }}">
            <i class="fas fa-home"></i> Home
        </a>
        <a href="{{ route('admin.galeri.index') }}" class="{{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
            <i class="fas fa-images"></i> Galeri
        </a>
        <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
            <i class="fas fa-newspaper"></i> Berita
        </a>
        <a href="{{ route('admin.informasi.index') }}" class="{{ request()->routeIs('admin.informasi.*') || request()->routeIs('admin.informasi-geosite.*') ? 'active' : '' }}">
            <i class="fas fa-info-circle"></i> Informasi
        </a>
        <a href="{{ route('admin.destinasi.index') }}" class="{{ request()->routeIs('admin.destinasi.*') ? 'active' : '' }}">
            <i class="fas fa-map-marked-alt"></i> Destinasi
        </a>
        
        <div class="menu-title">Detail Tambahan</div>
        <a href="{{ route('admin.detail-geosite.index') }}" class="{{ request()->routeIs('admin.detail-geosite.*') ? 'active' : '' }}">
            <i class="fas fa-map-marker-alt"></i> Lokasi & Detail
        </a>
        <a href="{{ route('admin.umkm.index') }}" class="{{ request()->routeIs('admin.umkm.*') ? 'active' : '' }}">
            <i class="fas fa-store"></i> UMKM
        </a>
        <a href="{{ route('admin.fasilitas.index') }}" class="{{ request()->routeIs('admin.fasilitas.*') ? 'active' : '' }}">
            <i class="fas fa-tools"></i> Fasilitas
        </a>
        <a href="{{ route('admin.penginapan.index') }}" class="{{ request()->routeIs('admin.penginapan.*') ? 'active' : '' }}">
            <i class="fas fa-hotel"></i> Penginapan
        </a>
        <a href="{{ route('admin.kontak.index') }}" class="{{ request()->routeIs('admin.kontak.*') ? 'active' : '' }}">
            <i class="fas fa-address-book"></i> Kontak
        </a>
        <a href="{{ route('admin.galeri-geosite.index') }}" class="{{ request()->routeIs('admin.galeri-geosite.*') ? 'active' : '' }}">
            <i class="fas fa-mountain"></i> Galeri Geosite
        </a>
        <a href="{{ url('/') }}" target="_blank">
            <i class="fas fa-globe"></i> Lihat Website
        </a>
    </div>
</div>

<!-- MAIN CONTENT -->
<div class="main-content" id="mainContent">
    <div class="top-bar">
        <div style="display: flex; align-items: center; gap: 16px;">
            <button class="menu-toggle" id="menuToggle">
                <i class="fas fa-bars"></i>
            </button>
            <div class="page-title">@yield('title', 'Dashboard')</div>
        </div>
        <div class="user-menu">
            <span class="user-name">
                <i class="fas fa-user-circle" style="font-size: 1.25rem; color: #003366; margin-right: 4px; vertical-align: middle;"></i>
                {{ Auth::user()->name ?? 'Admin GeoToba' }}
            </span>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </button>
            </form>
        </div>
    </div>

    @yield('content')
</div>

<script>
    // Toggle sidebar untuk mobile
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('open');
            sidebarOverlay.classList.toggle('active');
        });
    }

    // Tutup sidebar saat klik overlay
    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', function() {
            sidebar.classList.remove('open');
            sidebarOverlay.classList.remove('active');
        });
    }

    // Tutup sidebar saat klik di luar (untuk mobile)
    document.addEventListener('click', function(event) {
        const isMobile = window.innerWidth <= 768;
        if (isMobile && sidebar && !sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
            sidebar.classList.remove('open');
            sidebarOverlay.classList.remove('active');
        }
    });

    // Handle resize window
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            sidebar.classList.remove('open');
            sidebarOverlay.classList.remove('active');
        }
    });

    // Staggered animation for stat cards
    document.addEventListener('DOMContentLoaded', function() {
        const statCards = document.querySelectorAll('.stat-card');
        statCards.forEach((card, index) => {
            card.style.animationDelay = (index * 0.08) + 's';
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>