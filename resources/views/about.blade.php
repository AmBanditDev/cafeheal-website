@extends('layouts.user')

@section('title', 'เกี่ยวกับเรา - CafeHeal')

@section('contents')
    <div>
        <div class="relative h-[400px]"
            style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(https://assets-global.website-files.com/61c1522cd03553569e619b01/624d0b9208952404cd690aa6_5e54e9741e3cf65f8959fcc9_Cover.jpeg) no-repeat center;background-size:cover">
            <div class="flex flex-col gap-4 justify-center items-center w-full h-full px-3 md:px-0">

                <h1 class="dancing-script text-4xl md:text-5xl lg:text-6xl font-bold text-white">
                    CafeHeal
                </h1>
                <div class="divider divider-primary w-16 self-center my-1"></div>
                <h2 class="text-white text-xl md:text-2xl lg:text-3xl">
                    เกี่ยวกับเรา
                </h2>
            </div>
        </div>

        <section class="bg-white py-8">
            <div class="container mx-auto">
                <div class="px-6">
                    <nav id="store" class="w-full z-30 top-0 py-1">
                        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mb-6">
                            <h2
                                class="tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-2xl border-l-4 border-yellow-300 ps-3 mb-4">
                                ทำความรู้จักกับ <span class="dancing-script text-4xl">CafeHeal</span>
                            </h2>
                        </div>
                    </nav>

                    <div class="w-full flex flex-col lg:flex-row gap-10 lg:gap-20 mb-20">
                        <div class="w-100 lg:w-1/2" data-aos="fade-right" data-aos-duration="1000">
                            <div class="w-100 h-[400px]">
                                <img src="https://images.unsplash.com/photo-1445116572660-236099ec97a0?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </div>
                        <div class="w-100 lg:w-1/2 md:flex" data-aos="fade-right" data-aos-duration="2500">
                            <p class="text-xl self-center leading-10">
                                <i class="fa-solid fa-quote-left text-3xl mr-2"></i>
                                <b>CafeHeal หรือ คาเฟ่ฮีล</b> เป็น
                                เว็บไซต์ที่นำเสนอบทความและข้อมูลเกี่ยวกับร้านคาเฟ่ในจังหวัดกรุงเทพมหานครที่มีความเป็นเอกลักษณ์และน่าสนใจที่สุดให้กับคุณ.
                                ทางเรามุ่งมั่นที่จะเสนอข้อมูลที่ครบถ้วนและเป็นประโยชน์สำหรับผู้ที่กำลังมองหาประสบการณ์คาเฟ่ที่น่าทึ่งในเมืองกรุงเทพมหานคร
                                <i class="fa-solid fa-quote-right text-3xl ml-2"></i>
                            </p>
                        </div>
                    </div>

                    <div class="w-full flex flex-col-reverse lg:flex-row gap-10 lg:gap-20 mb-20">
                        <div class="w-100 lg:w-1/2 md:flex" data-aos="fade-left" data-aos-duration="2500">
                            <p class="text-xl self-center leading-10">
                                <i class="fa-solid fa-quote-left text-3xl mr-2"></i>
                                ทุกคาเฟ่ที่เราเลือกเสนอให้กับคุณได้รับการคัดเลือกอย่างดีเยี่ยม
                                ไม่ว่าจะเป็นบรรยากาศที่น่าตื่นตาตื่นใจ,
                                เมนูคาเฟ่ที่หลากหลายและคุณภาพ, บริการที่เป็นมืออาชีพ,
                                หรือที่นั่งที่สะดวกสบายสำหรับการทำงานหรือการพักผ่อน
                                <i class="fa-solid fa-quote-right text-3xl ml-2"></i>
                            </p>
                        </div>
                        <div class="w-100 lg:w-1/2" data-aos="fade-left" data-aos-duration="1000">
                            <div class="w-100 h-[400px]">
                                <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2047&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </div>
                    </div>

                    <p class="text-xl w-100 lg:w-2/3 mx-auto text-center leading-10" data-aos="zoom-in" data-aos-duration="1000">
                        เราเชื่อว่าความสนุกสนานและความผ่อนคลายไม่สามารถหาได้ในที่ใดนอกจากร้านคาเฟ่
                        และเราพร้อมที่จะช่วยคุณค้นพบสถานที่ที่ทำให้คุณรู้สึกเหมือนอยู่บ้านในบรรยากาศสบายๆของคาเฟ่ที่ดีที่สุดในกรุงเทพมหานคร
                    </p>

                    <div class="w-100 flex justify-center" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="divider divider-primary w-48 my-10"></div>
                    </div>
                    <div data-aos="zoom-in" data-aos-duration="2000"
                        class="flex items-center justify-center dancing-script tracking-wide no-underline hover:no-underline font-bold text-black text-5xl mb-10">
                        Cafe
                        <img src="/assets/location.png" alt="" style="width: 80px">
                        Heal
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
