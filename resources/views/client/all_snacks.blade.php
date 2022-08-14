@extends('layouts.layout_client')
@section('body')
    <main class="mainContent-theme">
        <section class="breadcrumb-theme mb-0 ">
            <div class="container-fluid">
                <div class="breadcrumb-list">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" itemprop="itemListElement">
                                <a href="/homepage" target="_self" itemprop="item"><span itemprop="name">Homepage</span></a>
                                <meta itemprop="position" content="1" />
                            </li>


                            <li class="breadcrumb-item active" itemprop="itemListElement">
                                <span itemprop="item" content="all.html"><strong itemprop="name">All Snacks</strong></span>
                                <meta itemprop="position" content="3" />
                            </li>


                        </ol>
                    </nav>
                </div>
                {{-- Show san pham --}}

            </div>
        </section>

    </main>
@endsection

@section('scripts')
@endsection
