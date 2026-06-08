import matplotlib
matplotlib.use('Agg')
import matplotlib.pyplot as plt
import matplotlib.patches as mpatches
from matplotlib.patches import FancyArrowPatch, FancyBboxPatch
import matplotlib.lines as mlines
import numpy as np

fig, ax = plt.subplots(figsize=(22, 16))
ax.set_xlim(0, 22)
ax.set_ylim(0, 16)
ax.axis('off')
fig.patch.set_facecolor('white')

# ─── Border frame ───────────────────────────────────────────────────────────
border = FancyBboxPatch((0.15, 0.15), 21.7, 15.7,
                        boxstyle="square,pad=0",
                        linewidth=1.5, edgecolor='black', facecolor='white')
ax.add_patch(border)

# Title
ax.text(0.45, 15.6, "sd Mengelola Galeri", fontsize=10, fontweight='bold',
        va='top', ha='left', fontfamily='monospace')

# ─── Lifeline X positions ────────────────────────────────────────────────────
x_pos = {
    'Pengunjung':       2.2,
    'GaleriView':       5.5,
    'GaleriController': 9.5,
    'GaleriModel':      14.0,
    'Database':         18.5,
}

y_top    = 14.6   # top of lifeline (below actor icon)
y_bottom = 0.5    # bottom of lifeline

# ─── Helper: draw stick figure ───────────────────────────────────────────────
def draw_actor(ax, x, y, label):
    # head
    head = plt.Circle((x, y + 0.55), 0.22, color='black', fill=False, linewidth=1.5, zorder=5)
    ax.add_patch(head)
    # body
    ax.plot([x, x],        [y + 0.33, y - 0.15], color='black', lw=1.5, zorder=5)
    # arms
    ax.plot([x - 0.3, x + 0.3], [y + 0.1, y + 0.1], color='black', lw=1.5, zorder=5)
    # legs
    ax.plot([x, x - 0.25], [y - 0.15, y - 0.55], color='black', lw=1.5, zorder=5)
    ax.plot([x, x + 0.25], [y - 0.15, y - 0.55], color='black', lw=1.5, zorder=5)
    ax.text(x, y - 0.75, label, ha='center', va='top', fontsize=8, fontweight='bold')

# ─── Helper: draw blue circle actor ──────────────────────────────────────────
def draw_circle_actor(ax, x, y, label):
    circle = plt.Circle((x, y + 0.3), 0.32,
                         facecolor='#3A7BD5', fill=True, linewidth=1.5,
                         edgecolor='#1A5BB5', zorder=5)
    ax.add_patch(circle)
    ax.text(x, y - 0.15, label, ha='center', va='top', fontsize=8, fontweight='bold')

# ─── Helper: draw database icon ──────────────────────────────────────────────
def draw_database(ax, x, y, label):
    from matplotlib.patches import Ellipse
    body = FancyBboxPatch((x - 0.32, y - 0.35), 0.64, 0.65,
                          boxstyle="square,pad=0",
                          linewidth=1.2, edgecolor='black', facecolor='#E8E8D0')
    ax.add_patch(body)
    top_ell = Ellipse((x, y + 0.30), 0.64, 0.20,
                      linewidth=1.2, edgecolor='black', facecolor='#E8E8D0', zorder=6)
    ax.add_patch(top_ell)
    bot_ell = Ellipse((x, y - 0.35), 0.64, 0.20,
                      linewidth=1.2, edgecolor='black', facecolor='#E8E8D0', zorder=6)
    ax.add_patch(bot_ell)
    ax.text(x, y - 0.75, label, ha='center', va='top', fontsize=8, fontweight='bold')

# ─── Draw actors ─────────────────────────────────────────────────────────────
actor_y = 15.05
draw_actor(ax,          x_pos['Pengunjung'],       actor_y - 0.3, 'Pengunjung')
draw_circle_actor(ax,   x_pos['GaleriView'],       actor_y,       'GaleriView')
draw_circle_actor(ax,   x_pos['GaleriController'], actor_y,       'GaleriController')
draw_circle_actor(ax,   x_pos['GaleriModel'],      actor_y,       'GaleriModel')
draw_database(ax,       x_pos['Database'],         actor_y,       'Database')

# ─── Draw dashed lifelines ───────────────────────────────────────────────────
for name, x in x_pos.items():
    ax.plot([x, x], [y_top, y_bottom],
            color='black', lw=1.0, linestyle='--', dashes=(4, 4), zorder=1)

# ─── Helper: activation box ──────────────────────────────────────────────────
def activation(ax, x, y_start, y_end, color='#3A7BD5', width=0.12):
    rect = FancyBboxPatch((x - width/2, y_end), width, y_start - y_end,
                          boxstyle="square,pad=0",
                          linewidth=1.0, edgecolor='#1A5BB5', facecolor=color, zorder=3)
    ax.add_patch(rect)

# ─── Helper: solid arrow (call) ───────────────────────────────────────────────
def call_arrow(ax, x1, x2, y, label, fontsize=7.5, label_offset=0.12):
    ax.annotate("", xy=(x2, y), xytext=(x1, y),
                arrowprops=dict(arrowstyle='->', color='black', lw=1.2))
    mid = (x1 + x2) / 2
    ax.text(mid, y + label_offset, label, ha='center', va='bottom', fontsize=fontsize,
            fontfamily='monospace')

# ─── Helper: dashed return arrow ─────────────────────────────────────────────
def return_arrow(ax, x1, x2, y, label, fontsize=7.5, label_offset=0.12):
    ax.annotate("", xy=(x2, y), xytext=(x1, y),
                arrowprops=dict(arrowstyle='->', color='black', lw=1.2,
                                linestyle='dashed',
                                connectionstyle='arc3,rad=0'))
    ax.plot([x1, x2], [y, y], color='black', lw=1.0,
            linestyle='--', dashes=(4, 3), zorder=2)
    mid = (x1 + x2) / 2
    ax.text(mid, y + label_offset, label, ha='center', va='bottom', fontsize=fontsize,
            fontfamily='monospace')

# ─── Sequence messages ────────────────────────────────────────────────────────
# Activation bars  (x, y_start, y_end)
activation(ax, x_pos['Pengunjung'],       14.0, 0.8,  color='#3A7BD5', width=0.10)
activation(ax, x_pos['GaleriView'],       13.5, 0.9,  color='#3A7BD5', width=0.10)
activation(ax, x_pos['GaleriController'], 13.0, 1.2,  color='#3A7BD5', width=0.10)
activation(ax, x_pos['GaleriModel'],      12.5, 1.5,  color='#3A7BD5', width=0.10)
activation(ax, x_pos['Database'],         11.5, 10.5, color='#3A7BD5', width=0.10)

# 1: GET /galeri
y1 = 13.8
call_arrow(ax, x_pos['Pengunjung'], x_pos['GaleriView'], y1,
           "1: GET /galeri")

# 2: index()
y2 = 13.2
call_arrow(ax, x_pos['GaleriView'], x_pos['GaleriController'], y2,
           "2: index()")

# 3: Galeri::where(...)
y3 = 12.5
call_arrow(ax, x_pos['GaleriController'], x_pos['GaleriModel'], y3,
           "3: Galeri::where('status', true)->orderBy('created_at','desc')->get()",
           fontsize=6.8)

# 4: SELECT * FROM galeri
y4 = 11.6
call_arrow(ax, x_pos['GaleriModel'], x_pos['Database'], y4,
           "4: SELECT * FROM galeri WHERE status=1 ORDER BY created_at DESC",
           fontsize=6.5)

# 4.1: $rawData (collection)
y41 = 10.8
return_arrow(ax, x_pos['Database'], x_pos['GaleriModel'], y41,
             "4.1: $rawData (collection)", fontsize=7.0)

# 5: $collection
y5 = 9.9
return_arrow(ax, x_pos['GaleriModel'], x_pos['GaleriController'], y5,
             "5: $collection")

# 6: $item->gambar_url
y6 = 9.1
call_arrow(ax, x_pos['GaleriController'], x_pos['GaleriModel'], y6,
           "6: $item->gambar_url (getGambarUrlAttribute())", fontsize=7.0)

# ─── Note box ────────────────────────────────────────────────────────────────
note_x, note_y = 14.5, 7.2
note_w, note_h = 5.0, 2.0
note_bg = FancyBboxPatch((note_x, note_y), note_w, note_h,
                         boxstyle="square,pad=0.05",
                         linewidth=1.0, edgecolor='black', facecolor='#FFFFDD', zorder=6)
ax.add_patch(note_bg)
# dog-ear
dog = plt.Polygon([[note_x + note_w - 0.35, note_y + note_h],
                   [note_x + note_w,         note_y + note_h - 0.35],
                   [note_x + note_w - 0.35, note_y + note_h - 0.35]],
                  closed=True, color='#CCCC88', zorder=7)
ax.add_patch(dog)
ax.plot([note_x + note_w - 0.35, note_x + note_w - 0.35],
        [note_y + note_h,         note_y + note_h - 0.35],
        color='black', lw=0.8, zorder=8)
ax.plot([note_x + note_w - 0.35, note_x + note_w],
        [note_y + note_h - 0.35, note_y + note_h - 0.35],
        color='black', lw=0.8, zorder=8)

note_text = ("Cek format gambar:\n"
             "- null  → placeholder URL\n"
             "- data: → base64 langsung\n"
             "- http/https → URL eksternal\n"
             "- else  → asset('storage/...')")
ax.text(note_x + 0.15, note_y + note_h - 0.15, note_text,
        ha='left', va='top', fontsize=7.2, fontfamily='monospace', zorder=9)

# dashed line from note to lifeline
ax.plot([x_pos['GaleriModel'] + 0.06, note_x],
        [8.2, 8.2], color='black', lw=0.8, linestyle='--', dashes=(3, 3), zorder=2)

# 6.1: $src (URL gambar)
y61 = 7.1
return_arrow(ax, x_pos['GaleriModel'], x_pos['GaleriController'], y61,
             "6.1: $src (URL gambar)", fontsize=7.0)

# 7: self-annotation on GaleriController
y7 = 6.3
ax.text(x_pos['GaleriController'] + 0.2, y7 + 0.1,
        "7: $allGaleri = $collection->map(fn)\n"
        "   $galeriByKategori = groupBy('kategori')\n"
        "   $allPhotos = values()->toArray()",
        ha='left', va='bottom', fontsize=6.8, fontfamily='monospace')
# small self-arrow
ax.annotate("", xy=(x_pos['GaleriController'] + 0.2, y7 - 0.15),
            xytext=(x_pos['GaleriController'] + 0.2, y7 + 0.05),
            arrowprops=dict(arrowstyle='->', color='black', lw=1.0,
                            connectionstyle='arc3,rad=-0.4'))

# 8: view(...)
y8 = 4.8
call_arrow(ax, x_pos['GaleriController'], x_pos['GaleriView'], y8,
           "8: view('pages.galeri', compact('galeriByKategori','allPhotos'))",
           fontsize=6.8)

# 9: TampilkanHalamanGaleri()
y9 = 3.9
return_arrow(ax, x_pos['GaleriView'], x_pos['Pengunjung'], y9,
             "9: TampilkanHalamanGaleri()")

# ─── Save as JPG ─────────────────────────────────────────────────────────────
output_path = r"d:\Semester 2\PA_REAL_1\PROJEK_REAL_1\sd_mengelola_galeri.jpg"
plt.tight_layout(pad=0.3)
plt.savefig(output_path, dpi=180, format='jpeg',
            bbox_inches='tight', facecolor='white', pil_kwargs={'quality': 95})
plt.close()
print("[OK] Diagram berhasil disimpan: " + output_path)
