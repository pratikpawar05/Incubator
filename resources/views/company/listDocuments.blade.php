@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
        <h3>Company Document List</h3>

        </div>
        <hr>
        <div class="row">
        <i class="fa fa-info-circle"><em>&nbsp;This is a list of all documents for each onboared company.</em></i>
        <br>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>PAN Card</th>
                        <th>TAN Card</th>
                        <th>Article of Association</th>
                        <th>Memorandum of Association</th>
                        <th>GST Certificate</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Fedex Pvt. Ltd.</td>
                        <td><a href="{{ url('/download_member_documents') }}" class="btn btn-info">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsTAN') }}" class="btn btn-success">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsAOA') }}" class="btn btn-primary">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsMOA') }}" class="btn btn-danger">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsGST') }}" class="btn btn-warning">Download <i class="fa fa-download"></i></a></td>
                    </tr>

                    <tr>
                        <td>Maccafine India</td>
                        <td><a href="{{ url('/download_member_documents') }}" class="btn btn-info">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsTAN') }}" class="btn btn-success">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsAOA') }}" class="btn btn-primary">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsMOA') }}" class="btn btn-danger">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsGST') }}" class="btn btn-warning">Download <i class="fa fa-download"></i></a></td>
                    </tr>

                    <tr>
                        <td>Whoop Pvt. Ltd.</td>
                        <td><a href="{{ url('/download_member_documents') }}" class="btn btn-info">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsTAN') }}" class="btn btn-success">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsAOA') }}" class="btn btn-primary">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsMOA') }}" class="btn btn-danger">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsGST') }}" class="btn btn-warning">Download <i class="fa fa-download"></i></a></td>
                    </tr>

                    <tr>
                        <td>Indian Oil</td>
                        <td><a href="{{ url('/download_member_documents') }}" class="btn btn-info">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsTAN') }}" class="btn btn-success">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsAOA') }}" class="btn btn-primary">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsMOA') }}" class="btn btn-danger">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsGST') }}" class="btn btn-warning">Download <i class="fa fa-download"></i></a></td>
                    </tr>

                    <tr>
                        <td>Dharma Prod Pvt. Ltd.</td>
                        <td><a href="{{ url('/download_member_documents') }}" class="btn btn-info">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsTAN') }}" class="btn btn-success">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsAOA') }}" class="btn btn-primary">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsMOA') }}" class="btn btn-danger">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsGST') }}" class="btn btn-warning">Download <i class="fa fa-download"></i></a></td>
                    </tr>
                    <tr>
                        <td>Red Chillies Pvt. Ltd.</td>
                        <td><a href="{{ url('/download_member_documents') }}" class="btn btn-info">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsTAN') }}" class="btn btn-success">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsAOA') }}" class="btn btn-primary">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsMOA') }}" class="btn btn-danger">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsGST') }}" class="btn btn-warning">Download <i class="fa fa-download"></i></a></td>
                    </tr>
                    <tr>
                        <td>Google Inc.</td>
                        <td><a href="{{ url('/download_member_documents') }}" class="btn btn-info">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsTAN') }}" class="btn btn-success">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsAOA') }}" class="btn btn-primary">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsMOA') }}" class="btn btn-danger">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsGST') }}" class="btn btn-warning">Download <i class="fa fa-download"></i></a></td>
                    </tr>
                    <tr>
                        <td>Amazon India.</td>
                        <td><a href="{{ url('/download_member_documents') }}" class="btn btn-info">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsTAN') }}" class="btn btn-success">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsAOA') }}" class="btn btn-primary">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsMOA') }}" class="btn btn-danger">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsGST') }}" class="btn btn-warning">Download <i class="fa fa-download"></i></a></td>
                    </tr>
                    <tr>
                        <td>Benefactory Ventures Pvt. Ltd.</td>
                        <td><a href="{{ url('/download_member_documents') }}" class="btn btn-info">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsTAN') }}" class="btn btn-success">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsAOA') }}" class="btn btn-primary">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsMOA') }}" class="btn btn-danger">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsGST') }}" class="btn btn-warning">Download <i class="fa fa-download"></i></a></td>
                    </tr>
                    <tr>
                        <td>Volv Media Pvt. Ltd.</td>
                        <td><a href="{{ url('/download_member_documents') }}" class="btn btn-info">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsTAN') }}" class="btn btn-success">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsAOA') }}" class="btn btn-primary">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsMOA') }}" class="btn btn-danger">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsGST') }}" class="btn btn-warning">Download <i class="fa fa-download"></i></a></td>
                    </tr>
                    <tr>
                        <td>AbhayTech Solutions</td>
                        <td><a href="{{ url('/download_member_documents') }}" class="btn btn-info">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsTAN') }}" class="btn btn-success">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsAOA') }}" class="btn btn-primary">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsMOA') }}" class="btn btn-danger">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsGST') }}" class="btn btn-warning">Download <i class="fa fa-download"></i></a></td>
                    </tr>
                    <tr>
                        <td>Vnnogile Solutions Pvt. Ltd.</td>
                        <td><a href="{{ url('/download_member_documents') }}" class="btn btn-info">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsTAN') }}" class="btn btn-success">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsAOA') }}" class="btn btn-primary">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsMOA') }}" class="btn btn-danger">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsGST') }}" class="btn btn-warning">Download <i class="fa fa-download"></i></a></td>
                    </tr>
                    <tr>
                        <td>Microsoft India</td>
                        <td><a href="{{ url('/download_member_documents') }}" class="btn btn-info">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsTAN') }}" class="btn btn-success">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsAOA') }}" class="btn btn-primary">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsMOA') }}" class="btn btn-danger">Download <i class="fa fa-download"></i></a></td>
                        <td><a href="{{ url('/downloadMemberDocsGST') }}" class="btn btn-warning">Download <i class="fa fa-download"></i></a></td>
                    </tr>




                </tbody>
            </table>
        </div>
    </div>
@endsection