<style>
  footer {
    background: var(--ink);
    color: rgba(255,255,255,.55);
    padding: 72px 32px 36px;
  }

  footer .footer-inner { max-width: 1260px; margin: 0 auto; }
  footer .footer-top {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1fr;
    gap: 48px;
    margin-bottom: 56px;
  }

  footer .footer-brand p {
    font-size: .84rem;
    line-height: 1.75;
    margin-top: 16px;
    max-width: 280px;
  }

  footer .footer-newsletter { margin-top: 22px; }
  footer .footer-newsletter p { font-size: .78rem; margin-bottom: 10px; color: rgba(255,255,255,.4); }
  footer .nl-row { display: flex; gap: 8px; }
  footer .nl-input {
    flex: 1;
    background: rgba(255,255,255,.06);
    border: 1px solid rgba(255,255,255,.1);
    border-radius: 8px;
    padding: 10px 14px;
    color: #fff;
    font-family: 'Outfit', sans-serif;
    font-size: .82rem;
    outline: none;
  }
  footer .nl-input:focus { border-color: var(--gold-line); }
  footer .nl-btn {
    background: var(--gold);
    border: none;
    color: var(--ink);
    padding: 10px 16px;
    border-radius: 8px;
    font-weight: 700;
    font-size: .8rem;
    cursor: pointer;
    font-family: 'Outfit', sans-serif;
  }

  footer .footer-col h4 {
    font-family: 'Playfair Display', serif;
    font-size: .95rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 18px;
    letter-spacing: .2px;
  }
  footer .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 10px; }
  footer .footer-col ul a {
    text-decoration: none;
    color: rgba(255,255,255,.45);
    font-size: .82rem;
    transition: color .15s;
  }
  footer .footer-col ul a:hover { color: rgba(255,255,255,.85); }

  footer .footer-bottom {
    padding-top: 28px;
    border-top: 1px solid rgba(255,255,255,.07);
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 24px;
    flex-wrap: wrap;
  }
  footer .footer-bottom p { font-size: .77rem; color: rgba(255,255,255,.3); }
  footer .footer-socials { display: flex; gap: 10px; }
  footer .soc-btn {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    background: rgba(255,255,255,.05);
    border: 1px solid rgba(255,255,255,.08);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: .85rem;
    cursor: pointer;
    text-decoration: none;
    color: rgba(255,255,255,.55);
    transition: background .18s, border-color .18s, color .18s;
  }
  footer .soc-btn:hover { background: var(--gold-bg); border-color: var(--gold-line); color: var(--gold-lt); }
  footer .footer-payments { display: flex; gap: 8px; align-items: center; }
  footer .pay-badge {
    background: rgba(255,255,255,.08);
    border: 1px solid rgba(255,255,255,.1);
    border-radius: 5px;
    padding: 4px 10px;
    font-size: .7rem;
    font-weight: 700;
    color: rgba(255,255,255,.5);
    letter-spacing: .5px;
  }

  @media (max-width: 1024px) {
    footer .footer-top { grid-template-columns: 1fr 1fr; }
  }

  @media (max-width: 768px) {
    footer .footer-top { grid-template-columns: 1fr; }
  }
</style>
