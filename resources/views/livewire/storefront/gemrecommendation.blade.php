<div>
     <!-- Astro Gemstone Finder Section -->
    <section id="astro-finder" class="py-5 scroll-margin" style="background: var(--color-bg, #f5f4f0);">
        <div class="container">

            {{-- Section Header --}}
            <div class="text-center mb-5" style="max-width: 560px; margin-inline: auto;">
                <span style="font-size:11px; font-weight:500; letter-spacing:0.12em; text-transform:uppercase; color:#b8860b; display:block; margin-bottom:6px;">
                    {{ $eyebrows['astro_finder'] ?? 'Vedic Recommendation' }}
                </span>
                <h2 style="font-size:26px; font-weight:500; color:#0d1b3e; font-family: Georgia, serif; margin-bottom:10px; letter-spacing:0.01em;">
                    {{ $sections['astro_finder'] ?? 'Find Your Astrological Gemstone' }}
                </h2>
                <p style="font-size:14px; color:#666;">{{ $descriptions['astro_finder'] ?? '' }}</p>
            </div>

            {{-- Main Card --}}
            <div style="background:#0d1b3e; border-radius:16px; padding:2.5rem 2rem; max-width:720px; margin:0 auto; border:0.5px solid rgba(232,168,0,0.25);">

                {{-- Step Indicator --}}
                <div style="display:flex; align-items:center; justify-content:center; gap:6px; margin-bottom:1.75rem;">
                    <div style="width:{{ $step >= 1 ? '20px' : '8px' }}; height:8px; border-radius:{{ $step === 1 ? '4px' : '50%' }}; background:{{ $step >= 1 ? '#e8a800' : 'rgba(255,255,255,0.15)' }}; transition:all 0.2s;"></div>
                    <div style="width:{{ $step >= 2 ? '20px' : '8px' }}; height:8px; border-radius:{{ $step === 2 ? '4px' : '50%' }}; background:{{ $step >= 2 ? '#e8a800' : 'rgba(255,255,255,0.15)' }}; transition:all 0.2s;"></div>
                    <div style="width:{{ $step >= 3 ? '20px' : '8px' }}; height:8px; border-radius:{{ $step === 3 ? '4px' : '50%' }}; background:{{ $step >= 3 ? '#e8a800' : 'rgba(255,255,255,0.15)' }}; transition:all 0.2s;"></div>
                </div>

                {{-- ─── STEP 1: Zodiac Selection ─── --}}
                @if($step == 1)
                <div>
                    <span style="font-size:11px; font-weight:500; letter-spacing:0.1em; text-transform:uppercase; color:#e8a800; display:block; text-align:center; margin-bottom:1.5rem;">
                        Step 1 — Select Your Zodiac Sign (Rashi)
                    </span>

                    <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:10px;">
                        @foreach($zodiacSigns as $zodiac)
                        <div wire:click="selectZodiac('{{ $zodiac->name }}')"
                            wire:loading.class="opacity-50"
                            style="background:rgba(255,255,255,0.04); border:0.5px solid rgba(232,168,0,0.18); border-radius:10px; padding:14px 8px 12px; text-align:center; cursor:pointer; transition:background 0.15s, border-color 0.15s, transform 0.1s;"
                            onmouseover="this.style.background='rgba(232,168,0,0.1)'; this.style.borderColor='#e8a800'; this.style.transform='translateY(-2px)';"
                            onmouseout="this.style.background='rgba(255,255,255,0.04)'; this.style.borderColor='rgba(232,168,0,0.18)'; this.style.transform='translateY(0)';">
                            <div style="font-size:22px; color:#e8a800; margin-bottom:5px;">{{ $zodiac->symbol }}</div>
                            <div style="font-size:12px; font-weight:500; color:#fff; margin-bottom:2px;">{{ $zodiac->name }}</div>
                            <div style="font-size:10px; color:rgba(255,255,255,0.45);">Lord: {{ $zodiac->lord }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- ─── STEP 2: Goal Selection ─── --}}
                @if($step == 2)
                <div>
                    {{-- Breadcrumb --}}
                    <div style="display:flex; justify-content:space-between; align-items:center; padding-bottom:1rem; margin-bottom:1.5rem; border-bottom:0.5px solid rgba(255,255,255,0.1);">
                        <span style="font-size:13px; color:rgba(255,255,255,0.55);">
                            Zodiac: <strong style="color:#fff;">{{ $selectedZodiac }}</strong>
                        </span>
                        <button wire:click="resetFinder"
                            style="font-size:12px; color:#e8a800; background:none; border:0.5px solid rgba(232,168,0,0.35); border-radius:6px; padding:4px 12px; cursor:pointer;"
                            onmouseover="this.style.background='rgba(232,168,0,0.12)'"
                            onmouseout="this.style.background='none'">
                            Change Zodiac
                        </button>
                    </div>

                    <span style="font-size:11px; font-weight:500; letter-spacing:0.1em; text-transform:uppercase; color:#e8a800; display:block; text-align:center; margin-bottom:1.5rem;">
                        Step 2 — Choose Your Primary Focus
                    </span>

                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px;">
                        @foreach($goals as $goal)
                        <div wire:click="selectGoal('{{ $goal->slug }}')"
                            wire:loading.class="opacity-50"
                            style="background:rgba(255,255,255,0.04); border:0.5px solid rgba(26,95,168,0.35); border-radius:12px; padding:1.75rem 1rem; text-align:center; cursor:pointer; display:flex; flex-direction:column; align-items:center; gap:10px; transition:background 0.15s, border-color 0.15s, transform 0.1s;"
                            onmouseover="this.style.background='rgba(26,95,168,0.15)'; this.style.borderColor='#1a5fa8'; this.style.transform='translateY(-2px)';"
                            onmouseout="this.style.background='rgba(255,255,255,0.04)'; this.style.borderColor='rgba(26,95,168,0.35)'; this.style.transform='translateY(0)';">
                            <i class="bi {{ $goal->icon }}" style="font-size:28px; color:#e8a800;"></i>
                            <span style="font-size:13px; font-weight:500; color:#fff;">{{ $goal->title }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- ─── STEP 3: Result ─── --}}
                @if($step == 3 && $recommendation)
                <div style="text-align:center;">

                    {{-- Result Heading --}}
                    <div style="display:flex; align-items:center; justify-content:center; gap:8px; margin-bottom:1.5rem;">
                        <i class="bi bi-award-fill" style="color:#e8a800; font-size:20px;"></i>
                        <span style="font-size:16px; font-weight:500; color:#e8a800; letter-spacing:0.03em;">Your Astrological Match</span>
                    </div>

                    {{-- Gem Card --}}
                    <div style="background:rgba(255,255,255,0.04); border:0.5px solid rgba(232,168,0,0.3); border-radius:12px; padding:1.5rem; display:grid; grid-template-columns:160px 1fr; gap:1.5rem; align-items:center; max-width:600px; margin:0 auto 1.5rem; text-align:left;">

                        <div  style="width:100%; aspect-ratio:1; border-radius:10px; border:1.5px solid rgba(232,168,0,0.4); overflow:hidden;">
                            <img src="{{ asset($recommendation['image']) }}"
                                alt="{{ $recommendation['gem_name'] }}"
                                style="width:100%; height:100%; object-fit:cover; display:block;">
                        </div>

                        <div>
                            <span style="display:inline-block; font-size:11px; font-weight:500; letter-spacing:0.06em; background:#e8a800; color:#0d1b3e; border-radius:5px; padding:3px 10px; margin-bottom:10px; text-transform:uppercase;">
                                Governed by: {{ $recommendation['planet'] }}
                            </span>
                            <div style="font-size:22px; font-weight:500; color:#e8a800; margin-bottom:12px;">
                                {{ $recommendation['gem_name'] }}
                            </div>
                            <div style="font-size:10px; font-weight:500; letter-spacing:0.1em; text-transform:uppercase; color:rgba(255,255,255,0.45); margin-bottom:6px;">
                                Astrological Benefits
                            </div>
                            <p style="font-size:13px; color:rgba(255,255,255,0.72); line-height:1.6; margin:0;">
                                {{ $recommendation['benefits'] }}
                            </p>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div style="display:flex; gap:10px; justify-content:center; flex-wrap:wrap;">
                        <a href="{{ route('storefront.shop', ['category' => $recommendation['category']]) }}"
                            style="background:#e8a800; color:#0d1b3e; border:none; border-radius:8px; padding:11px 24px; font-size:14px; font-weight:500; text-decoration:none; display:inline-block;">
                            View Certified {{ $recommendation['category'] }}s →
                        </a>
                        <button wire:click="resetFinder"
                            style="background:transparent; color:#fff; border:0.5px solid rgba(255,255,255,0.3); border-radius:8px; padding:11px 24px; font-size:14px; cursor:pointer;">
                            Calculate Again
                        </button>
                    </div>

                </div>
                @endif

            </div>{{-- /astro-card --}}
        </div>{{-- /container --}}
    </section>

    {{-- Responsive: Stack zodiac grid on mobile --}}
    <style>
        @media (max-width: 576px) {
            #astro-finder [style*="grid-template-columns:repeat(4)"] {
                grid-template-columns: repeat(3, 1fr) !important;
            }

            #astro-finder [style*="grid-template-columns:160px"] {
                grid-template-columns: 1fr !important;
            }

            #astro-finder [style*="grid-template-columns:1fr 1fr"] {
                grid-template-columns: 1fr !important;
            }
        }
    </style>
</div>
