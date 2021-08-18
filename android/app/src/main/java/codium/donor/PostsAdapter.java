package internfinder.package;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.resource.bitmap.CircleCrop;

import java.util.ArrayList;

public class PostsAdapter extends RecyclerView.Adapter<PostsAdapter.ViewHolder> {

    private ArrayList<PostsClass> postsClasses;
    private Context context;

    public PostsAdapter(Context context) {
        this.context = context;
    }
    public void getPostClasses(ArrayList<PostsClass> postsClasses) {
        this.postsClasses = postsClasses;
    }

    @NonNull
    @Override
    public PostsAdapter.ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        LayoutInflater layoutInflater = LayoutInflater.from(parent.getContext());
        View listItem= layoutInflater.inflate(R.layout.single_post, parent, false);
        ViewHolder viewHolder = new ViewHolder(listItem);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(@NonNull PostsAdapter.ViewHolder holder, int position) {
        PostsClass postsClass = postsClasses.get(position);
        holder.dateRange.setText(postsClass.getStartDate()+" to "+postsClass.getEndDate());
        holder.post_name.setText(postsClass.getPost_name());
        holder.company_name.setText(postsClass.getCompany_name());
        holder.email.setText(postsClass.getEmail());
        holder.phone.setText(postsClass.getPhone());
        holder.intern_type.setText(postsClass.getIntern_type());
        holder.certification.setText(postsClass.getCertification());
        holder.submitteddate.setText(postsClass.getSubmitteddate());
        holder.location.setText(postsClass.getLocation());
        holder.ac_years.setText(postsClass.getAc_years());
        holder.accepted_docs.setText(postsClass.implode());
        holder.description.setText(postsClass.getDescription());
        holder.applicants.setText(postsClass.getApplied()+"/"+postsClass.getApplicants());

        Glide.with(context).load(postsClass.getCompany_logo()).transform(new CircleCrop()).centerCrop().placeholder(R.drawable.ic_refresh_icon).error(R.drawable.ic_refresh_icon).into(holder.company_logo);

        holder.apply.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Toast.makeText(view.getContext(),"postID: "+postsClass.getPostID(),Toast.LENGTH_LONG).show();
            }
        });
    }

    @Override
    public int getItemCount() {
        return postsClasses.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        private TextView applicants,apply,dateRange,submitteddate,accepted_docs,description,ac_years,intern_type,certification,location,email,phone,company_name,post_name;
        private ImageView company_logo;;
        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            dateRange = itemView.findViewById(R.id.dateRange);
            company_logo = itemView.findViewById(R.id.companyImage);
            post_name = itemView.findViewById(R.id.post_name);
            company_name = itemView.findViewById(R.id.companyName);
            email = itemView.findViewById(R.id.companyEmail);
            phone = itemView.findViewById(R.id.companyTel);
            intern_type = itemView.findViewById(R.id.intern_type);
            certification = itemView.findViewById(R.id.certification);
            submitteddate = itemView.findViewById(R.id.entryDate);
            location = itemView.findViewById(R.id.location);
            ac_years = itemView.findViewById(R.id.ac_years);
            accepted_docs = itemView.findViewById(R.id.accepted_docs);
            description = itemView.findViewById(R.id.description);
            apply = itemView.findViewById(R.id.apply);
            applicants = itemView.findViewById(R.id.applicants);

        }
    }
}
