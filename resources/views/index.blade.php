@extends('app')


@section('page-section')
<section id="contact" style="background-image:url('Landing/assets/img/tagore_hill2.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-6 text-center">
                <h2 class="text-uppercase section-heading"><u>(Unified portal for Advertisement Application for
                        Jharkhand State ULBs)</u></h2>
                <!-- form  -->
                <table class="table">
                    <tbody>
                        <tr>
                            <td><label for="">To apply online please select an Urban Local Body</label></td>
                        </tr>
                        <tr>
                            <td>
                                <select name="" id="" class="form-control">
                                    <option value="">-- Select --</option>
                                    <option value="Ranchi">Ranchi</option>
                                </select>
                            </td>
                            <td>
                                <form action="rnc/user/Dashboard">
                                    <button type="submit" class="btn btn-success">Apply</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table">
                    <tbody>
                        <tr>
                            <td><label for="">To See Advertisement Tax Fees and Procedures &nbsp;</label></td>
                        </tr>
                        <tr>
                            <td>
                                <select name="" id="" class="form-control">
                                    <option value="">-- Select ULB --</option>
                                    <option value="Ranchi">Ranchi</option>
                                </select>
                            </td>
                            <td><button class="btn btn-success">Apply</button></td>
                        </tr>
                    </tbody>
                </table>
                <!-- form  -->
            </div>
        </div>
    </div>
</section>
@endsection
